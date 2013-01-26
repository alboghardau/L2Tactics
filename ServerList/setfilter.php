<?php
session_start();

$action = $_GET['action'];

//read filters



//setting filters

if($action == 'add')
{

    if(isset($_POST['minrate']))
    {
        if(is_numeric($_POST['minrate']))
            {        
                $_SESSION['filters'][0] = $_POST['minrate'];
            }
    }    
    
    if(isset($_POST['maxrate']))
    {
        if(is_numeric($_POST['maxrate']))
            {        
                $_SESSION['filters'][1] = $_POST['maxrate'];
            }
    }
    
    if(isset($_POST['antibot']))
    {
         $_SESSION['filters'][2] = $_POST['antibot'];
    }
    
    if(isset($_POST['donation']))
    {
         $_SESSION['filters'][3] = $_POST['donation'];
    }
    
        if(isset($_POST['chronicle']))
    {
         $_SESSION['filters'][4] = $_POST['chronicle'];
    }
}

//filters unset

if($action == 'del')
{
    
        unset($_SESSION['filters']);
    
}

//each filter remove

if($action == 'rem')
{

    unset($_SESSION['filters'][$_GET['f']]);
    
}


header('Location: index.php');
?>
