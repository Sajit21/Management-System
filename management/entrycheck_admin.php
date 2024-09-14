<?php
    session_start();
    if(empty($_SESSION["uid"]) && empty($_SESSION["uname"]) && empty($_SESSION["admin"])){
        header("location:login.php");
    }
    if($_SESSION["admin"] == false){
        header("location:login.php");
    }
?>
