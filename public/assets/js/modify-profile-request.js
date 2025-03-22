$(function () {
    let counter = 2;

    $('#add-more-btn').click(function () {
        var fields = $(".fields").html();
        $('#table-body').append(`
        <tr><td class="text-center">${counter++}</td>
        <td><select class="form-select" name="assigned_to[]" required><option value="hr@prakharsoftwares.com">Profile Update Query (hr@prakharsoftwares.com)</option></select></td>
        <td><select class="form-select" name="changed_column[]" required>${fields}</select></td>
        <td><textarea name="description[]" class="form-control" placeholder="Enter Title with short Description" required></textarea></td>
        <td><input class="form-control form-control-sm" type="file" name="file[]" accept="application/pdf" required></td>
        <td><button class="btn btn-sm btn-danger remove-btn">Remove</button></td></tr>
    `)
    });

    $(document).on('click', '.remove-btn, .reset-btn', function () {
        const row = $(this).closest('tr');
        if ($(this).hasClass('remove-btn')) row.remove();
        else row.find('select, textarea, input').val('');
        $('#table-body tr').each((i, row) => $(row).find('td:first').text(i + 1)); // Update serial numbers
        counter--;
    });

    $("form.request-form").submit(function () {
        $(this).find("button[type=submit]").attr("disabled", "disabled");
        Swal.fire({
            title: "wait...",
            didOpen: () => {
              Swal.showLoading();
            },
            allowOutsideClick: false
        });
    });
});