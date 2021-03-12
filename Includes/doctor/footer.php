<script src="<?php echo $js ?>jquery.js"></script>
<script src="<?php echo $js ?>bootstrap.min.js"></script>
<script src="<?php echo $js ?>bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script src="<?php echo $js ?>backend.js"></script>

<script>
 
       
$('.form_datetime').datetimepicker({
    language: 'uk',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
});
$('.form_time').datetimepicker({
    language: 'uk',
    datepicker: false,
    timepicker: false,
    format: 'h:i',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 1,
    minView: 0,
    maxView: 1,
    forceParse: 0,

});

$('.form_date').datetimepicker({
    language: 'uk',
    datepicker: true,
    timepicker: false,
    format: 'yyyy/mm/dd',
    weekStart: true,
    defaultDate:'now',
    autoclose: 1,
    todayHighlight: 1,
    showOtherMonths:true,
    selectOtherMonths:true,
    startView: 2,
    minView: 2,
    forceParse: 0,
    changeMonth: true,
    changeYear:true,
    minDate:new Date(),
    daysOfWeekDisabled:[ ]
});


</script>
</body>

</html>