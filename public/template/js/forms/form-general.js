
$('#kt_touchspin_4, #kt_touchspin_2_4').TouchSpin({
    buttondown_class: 'btn btn-secondary',
    buttonup_class: 'btn btn-secondary',
    verticalbuttons: true,
    verticalup: '<i class="ki ki-plus"></i>',
    verticaldown: '<i class="ki ki-minus"></i>'
});


$('#kt_touchspin_1, #kt_touchspin_2_1').TouchSpin({
    buttondown_class: 'btn btn-secondary',
    buttonup_class: 'btn btn-secondary',

    min: 0,
    max: 1000,
    step: 0.1,
    decimals: 2,
    boostat: 5,
    maxboostedstep: 10,
});

// date only
$('#kt_datetimepicker_3').datetimepicker({
    format: 'L'
});

// default time
$('#kt_timepicker_3, #kt_timepicker_3_modal').timepicker({
    // defaultTime: '11:45:20 AM',
    minuteStep: 1,
    showSeconds: true,
    showMeridian: true
});

// minimum setup
$('#kt_timepicker_2, #kt_timepicker_2_modal').timepicker({
    minuteStep: 1,
    defaultTime: '',
    showSeconds: true,
    showMeridian: false,
    snapToStep: true
});

// Demo 6
$('#kt_datetimepicker_6').datetimepicker({
    // defaultDate: '11/1/2020',
    disabledDates: [
        moment('12/25/2020'),
        new Date(2020, 11 - 1, 21),
        '11/22/2022 00:53'
    ]
});

//Icon Input
// left alignment setup
$('#kt_daterangepicker_3').daterangepicker({
    buttonClasses: ' btn',
    applyClass: 'btn-primary',
    cancelClass: 'btn-secondary'
}, function(start, end, label) {
    $('#kt_daterangepicker_3 .form-control').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
});

$('#kt_daterangepicker_3_modal').daterangepicker({
    buttonClasses: ' btn',
    applyClass: 'btn-primary',
    cancelClass: 'btn-secondary'
}, function(start, end, label) {
    $('#kt_daterangepicker_3 .form-control').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
});

// multi select
$('#kt_select2_3').select2({
    placeholder: "Select a state",
});
