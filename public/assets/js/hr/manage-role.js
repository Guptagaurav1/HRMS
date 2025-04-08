// $('.checkall').on('change', function() {
//     $('.checkallCheckbox').prop('checked', $(this).prop('checked'));
// });


document.addEventListener('DOMContentLoaded', function() {
    // When master checkbox is clicked
    document.querySelectorAll('.checkall').forEach(function(checkAllBox) {
        checkAllBox.addEventListener('change', function() {
            const section = this.dataset.section;
            const checkboxes = document.querySelectorAll('.checkbox-group[data-section="' + section + '"] .checkallCheckbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    });

    // Optional: Update "Check All" checkbox if any child is unchecked
    document.querySelectorAll('.checkallCheckbox').forEach(function(cb) {
        cb.addEventListener('change', function() {
            const section = this.closest('.checkbox-group').dataset.section;
            const allBoxes = document.querySelectorAll('.checkbox-group[data-section="' + section + '"] .checkallCheckbox');
            const checkAll = document.querySelector('.checkall[data-section="' + section + '"]');
            const allChecked = [...allBoxes].every(box => box.checked);
            checkAll.checked = allChecked;
        });
    });
});