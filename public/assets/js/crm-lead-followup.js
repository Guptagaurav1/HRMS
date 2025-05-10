    $(document).ready(function() {
        $(".myModel").click(function() {
            var status = $(this).data("status");
            var lead_id = $(this).data("lead_id");
            document.getElementById('status').value = status;
            if (status == "Lose") {
                document.getElementById('wo_no_id').style.display = 'none';
                document.getElementById('wo_no_lab').style.display = 'none';
                document.getElementById('clos_amt_lab').style.display = 'none';
                document.getElementById('clos_amt').style.display = 'none';
                document.getElementById('status_remarks').style.display = 'none';
                document.getElementById('lose_remarks').style.display = '';
                document.getElementById('status_label').innerHTML = 'You Have Selected  Lose';
                document.getElementById('status_label').style.color = 'red';
                document.getElementById('status_remarks').removeAttribute("required");
                document.getElementById('clos_amt').removeAttribute("required");
                document.getElementById('lose_remarks').setAttribute("required", "required");
            } else {
                document.getElementById('wo_no_id').style.display = 'block';
                document.getElementById('wo_no_lab').style.display = 'block';
                document.getElementById('clos_amt_lab').style.display = 'block';
                document.getElementById('clos_amt').style.display = 'block';
                document.getElementById('status_remarks').style.display = 'block';
                document.getElementById('lose_remarks').style.display = 'none';
                document.getElementById('status_label').innerHTML = 'You Have Selected  Win';
                document.getElementById('status_label').style.color = 'green';
                document.getElementById('lose_remarks').removeAttribute("required");
                document.getElementById('clos_amt').setAttribute("required", "required");
                document.getElementById('status_remarks').setAttribute("required", "required");
            }
            //set as Model heading
            document.getElementById('lead_name').innerHTML = lead_id;

            $("#myModal").modal('show');
        });

        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#follow_up_date').attr('min', maxDate);

    });