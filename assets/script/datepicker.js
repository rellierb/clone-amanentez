$(document).ready(function() {

    $(function() {
        $('input[name="checkDate"]').daterangepicker({
            autoUpdateInput: false,
            minDate: moment().add(1, 'days'),
            startDate: moment().add(1, 'days'),
            endDate: moment().add(2, 'days'),
            showDropdowns: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
    
        $('input[name="checkDate"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
    
        $('input[name="checkDate"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
});


