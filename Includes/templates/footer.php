<script src="<?php echo $js ?>jquery.js"></script>
<script src="<?php echo $js ?>bootstrap.min.js"></script>
<script src="<?php echo $js ?>bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script src="<?php echo $js ?>backend.js"></script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['rele']))
{ 
    
    $s = $_POST['fd'];
    $stmt = $db-> prepare("SELECT * FROM  day_workk WHERE  docto = ? ");
    $stmt-> execute(array($s));
    $row = $stmt-> fetch();
    $count = $stmt-> rowCount();
    if ($count > 0) {
        $su = $row['Sunday'];
        $mo = $row['Monday'];
        $tu = $row['Tuesday'];
        $we = $row['Wednesday'];
        $th = $row['Thursday'];
        $fr = $row['Friday'];
        $sa = $row['Saturday'];
        $da=array( $su
        ,$mo
        ,$tu
        ,$we
        ,$th
        ,$fr
        ,$sa);
    

?>
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
    startDate: '-0d',
    endDate: '+1m',
    minDate: 0,
    maxDate: '+1m' ,
    daysOfWeekDisabled:[ <?php  
       echo $da[1] .','. $da[2] .','. $da[3].','. $da[4].','. $da[5].','. $da[6].','. $da[0] ;
     
          ?>]
});

<?php
    }
}

}

    ?>

</script>
</body>

</html>