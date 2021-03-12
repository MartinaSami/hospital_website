$(function(){
    $("#55").hide();
  });
  
  $(function(){
    $("#77").hide();
  });



 
  $("#bte").click(function(){
    $("#55").toggle();
    $("#77").hide();
  });

  $("#btl").click(function(){
    $("#77").toggle();
    $("#55").hide();
  });