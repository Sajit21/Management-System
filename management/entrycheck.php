<?php
    session_start();
    if(empty($_SESSION["uid"]) && empty($_SESSION["uname"])){
        header("location:login.php");
    }
?>