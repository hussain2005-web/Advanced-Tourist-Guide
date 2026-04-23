<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="travel";

$conn=new mysqli($servername,$username,$password,$dbname) or die("error"); 
 
?>