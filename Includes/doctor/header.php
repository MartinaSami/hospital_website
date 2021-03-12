<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> <?php getTitle() ?> </title>
    <link rel="stylesheet" href="<?php echo $cs ?>bootstrap.css">
    <link rel="stylesheet" href="<?php echo $cs ?>all.min.css">
    <link rel="stylesheet" href="<?php echo $cs ?>bootstrap-datetimepicker.min.css" media="screen">  
    <link rel="stylesheet" href="<?php echo $cs ?>backend.css">
<style>


.thumbnail {
    width: 100%;
    height: 100%;
    display: block;
    padding: 0px;
    margin-bottom: 10px;
    line-height: 1.5384616;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 3px;
    -webkit-transition: border 0.2s ease-in-out;
    -o-transition: border 0.2s ease-in-out;
    transition: border 0.2s ease-in-out;
}




.panel {
    margin-bottom: 20px;
    border-color: #ddd;
    color: #333333;
}


.rounded {
  padding: 30px;
  transition: transform .2s; /* Animation */
  width: 300px;
  height: 300px;
  margin: 0 auto;
}

.rounded:hover {
  transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}


</style>
</head>

<body>