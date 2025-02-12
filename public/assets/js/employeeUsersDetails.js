$(document).ready(function() {
    let counter = 1;

    // Add More Row
    $('.add-more-btn').click(function() {
        const newRow = `
            <tr>
                <td class="text-center"><input type="text" class="form-control form-control-sm"></td>
                <td class="text-center"><input type="number" class="form-control form-control-sm"></td>
                <td class="text-center"><input type="text" class="form-control form-control-sm"></td>
                <td class="text-center">
                <button class="btn btn-sm btn-primary add-more-btn"> Add More</button>
                <button class="btn btn-sm btn-primary">Save</button>
                    <button class="btn btn-sm btn-danger remove-btn">Delete</button>
                </td>
            </tr>
        `;
        $('#table-body').append(newRow);
    });

    $(document).on('click', '.remove-btn', function() {
        $(this).closest('tr').remove(); 
    });
});
