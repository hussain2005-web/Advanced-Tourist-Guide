<?php
@include 'conn.php';
 $select = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
 
?>
<style>
    .my-bookings {
    margin: 20px;
  }
  
  .my-bookings h1 {
    color: #8e44ad;
    margin-bottom: 20px;
  }
  
  .my-bookings table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .my-bookings th,
  .my-bookings td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
  }
  
  .my-bookings th {
    background-color: #8e44ad;
    color: #fff;
  }
  
  .my-bookings tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  .my-bookings tbody tr:hover {
    background-color: #f2f2f2;
  }
  </style>
<div class="my-bookings">
    <h1>USER DATA</h1>
    <table>
     <thead>
        <tr>
            <th>NAME</th>
            
            <th>EMAIL-ID</th>
            
            <th>PHONE NO.</th>
        </tr>
     </thead>
     <?php
       while($row= mysqli_fetch_assoc($select)){
     ?>
     <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        </tr>
     <?php
       };
     ?>
    </table>
</div>