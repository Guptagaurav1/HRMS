$('.delete-organization').click(function() {
    var id = $(this).data('id');

    Swal.fire({
        title: "Are you sure?",
        text: "You want to delete This record!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirm"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = SITE_URL + '/hr/organizations/delete/' + id;
        }
    });
})

// Select City on behalf of state

$('#state').on('change', function() {
    var id = $('#state').val();
    if (id) {
        $.ajax({
            url: SITE_URL + '/hr/organizations/get-city/' + id,
            type: "Get",
            success: function(res) {
                console.log(res.data);

                $('#city').html('<option value="">-- Select City --</option>');
                $.each(res.data, function(key, value) {

                    $("#city").append('<option value="' + value

                        .id + '">' + value.city_name + '</option>');

                });
            }
        });
    } else {
        $('#city').empty().append('<option value="">Select City</option>');
    }

})


// this code for psu

$('#psu').on('change', function() {
    var psuData = $(this).val();
    if (psuData === 'yes') {
        $('#psu_name').show()
    } else {
        $('#psu_name').hide()
    }
});

// display details of organization

$(document).ready(function() {

    /* When click show user */
    $('body').on('click', '#show-user', function() {
        var userURL = $(this).data('url');
        $.get(userURL, function(data) {
            var respData = data.data;
            // display created Date
            var date = new Date(respData.created_at);
            var month = ((date.getDate() > 8) ? (date.getDate() + 1) : ('0' + (date.getDate() + 1))) + '-' + ((date.getMonth() > 9) ? date.getMonth() : ('0' + date.getMonth())) + '-' + date.getFullYear();
            $('#userShowModal').modal('show');
            $('#name').text(respData.name);
            $('#email').text(respData.email);
            $('#contact').text(respData.contact);
            $('#state').text(respData.get_state.state);
            $('#city').text(respData.get_city.city_name);
            $('#psu').text(titleCase(respData.psu));
            $('#psu_name').text(respData.psu_name);
            $('#postal_code').text(respData.postal_code);
            $('#address').text(respData.address);
            $('#date').text(month);
        })
    });

});

// for title case

function titleCase(str) {
    return str.toLowerCase().replace(/\b\w/g, s => s.toUpperCase());
}