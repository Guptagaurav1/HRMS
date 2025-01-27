$(function() {
    $('.multiDatePicker').multiDatesPicker({
        dateFormat: "yy-mm-dd",
        onSelect: function(dateText) {
            console.log("Selected Dates:", $(this).multiDatesPicker('getDates'));
        }
    });
    $('.date-picker').datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    onClose: function(dateText, inst) { 
        $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
  
  });
  });