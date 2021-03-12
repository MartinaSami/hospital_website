<?php 
$dsn ='mysql:host=localhost;dbname=hospital'; //data source name
$user ='sa';
$passwor ='!@#healthy12345';
$options =array(

    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8 '

);
try{
$db = new  PDO($dsn,$user,$passwor,$options);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $w)
{ echo" failed". $w->getMessage();
}
?>