<?php
    include("entrycheck.php");
    session_destroy();
    header("location:login.php");
?>