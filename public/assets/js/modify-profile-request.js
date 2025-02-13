$(function () {
    let counter = 1;
    $('#add-more-btn').click(() => $('#table-head').append(`
        <tr><td class="text-center">${counter++}</td>
        <td><select class="form-select"><option>Select Option</option><option>1</option><option>2</option><option>3</option></select></td>
        <td><select class="form-select"><option>Select Option</option><option>1</option><option>2</option><option>3</option></select></td>
        <td><textarea class="form-control"></textarea></td>
        <td><input class="form-control form-control-sm" type="file"></td>
        <td><button class="btn btn-sm btn-primary reset-btn">Reset</button><button class="btn btn-sm btn-danger remove-btn">Remove</button></td>
    `));

   

    $(document).on('click', '.remove-btn, .reset-btn', function () {
        const row = $(this).closest('tr');
        if ($(this).hasClass('remove-btn')) row.remove();
        else row.find('select, textarea, input').val('');
        $('#table-body tr').each((i, row) => $(row).find('td:first').text(i + 1)); // Update serial numbers
    });
});