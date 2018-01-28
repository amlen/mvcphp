<?php
if (!isset($_SESSION))
    session_start();

if(!empty($_GET["name"]))
{
    if(isset($reservation))
        unset($reservation);
    include 'controller/controller_'.$_GET['name'].'.php';
}

else
    include "controller/controller.php";
?>
