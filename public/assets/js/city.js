 // Get Cities.
 $("select[id=state]").change(function (){
    $.ajax({
        url : SITE_URL+ '/hr/recruitment/cities',
        type : 'post',
        dataType : 'json',
        data : {
            '_token' : $("meta[name=csrf-token]").attr('content'),
           'stateid' : $(this).val()
        },
        success : function(response) {
            if(response.success) {
                var html = '<option value="" selected>Select City</option>';
                $.each(response.cities, function(index, value) {
                    html += '<option value="' + value.id + '">' + value.city_name + '</option>';
                });
                $('select[name=emp_city]').html(html);
                // for work city
                $('select[name=city]').html(html);
                // for work invoice city
                $('select[name=invoice_city]').html(html);
            } else {
                var html = '<option value="" selected>Select City</option>';
                $('select[name=emp_city]').html(html);
                // for work city
                $('select[name=city]').html(html);
                 // for work invoice city
                $('select[name=invoice_city]').html(html);
            }
        }
    });
});
