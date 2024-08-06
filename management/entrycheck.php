//checks the entry of the admin 

<?php
    session_start();
    if(empty($_SESSION["uid"]) && empty($_SESSION["uname"])){
        header("location:login.php");
    }
?>
