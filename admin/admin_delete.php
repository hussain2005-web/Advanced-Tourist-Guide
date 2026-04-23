<?php
@include 'conn.php';
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM package WHERE p_id = $id");
  header('location:dashboard.php?page=update');
 };
?>