//conncting to database but still some errors if we don't create database in phpmyadmin
<?php
$server="localhost";
$username="root";
$password="";
$dbname="data";

$conn=new mysqli($server,$username,$password,$dbname);
if($conn->connect_error)
{
    die("not connected to database" .$conn->$connect_error);
}
else{
    echo "connected successfully <br>";
}
?>
