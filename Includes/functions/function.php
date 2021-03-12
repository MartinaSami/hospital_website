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
