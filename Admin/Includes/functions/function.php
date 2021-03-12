<?php

//function to get Title
function getTitle()
{
    global $pagetitle;
    if(isset($pagetitle))
    {
        echo $pagetitle;
        
    }  else
    {
        echo 'Default';
    } 
}

function getCount($ACT,$TABLE)
{
    global $db;
    $stmt =$db->prepare("SELECT COUNT($ACT)FROM $TABLE  ");
    $stmt->execute();
    return $stmt->fetchColumn();
}

?>
