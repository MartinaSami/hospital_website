<script src="<?php echo $js ?>jquery.js"></script>
<script src="<?php echo $js ?>bootstrap.min.js"></script>
<script src="<?php echo $js ?>bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="<?php echo $js ?>bootstrap-datetimepicker.ar.js" charset="UTF-8"></script>
<script src="<?php echo $js ?>backend.js"></script>
<!--<script src="<?//php echo $js ?>Date.js"></script> -->



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
$('.form_date').datetimepicker({
    language: 'uk',
    datepicker: true,
    timepicker: false,
    format: 'yy/mm/dd',
    weekStart: true,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
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
</script>
</body>

</html>