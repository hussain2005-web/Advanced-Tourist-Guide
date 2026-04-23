<?php
@include 'conn.php';
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  mysqli_query($conn, "UPDATE  booking SET STATUS='cancelled' WHERE booking_id = $id");
  header('location:dashboard.php?page=mybooking');
 };
?>