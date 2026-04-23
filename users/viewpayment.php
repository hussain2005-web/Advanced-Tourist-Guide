<?php
@include 'conn.php';
$select = mysqli_query($conn, "SELECT * FROM payment where user_id = ".$_SESSION['user_id']." ORDER BY payment_id DESC");
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
    <table class="package-display-table">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Booking ID</th>
                <th>User Id</th>
                <th>Payment Date</th>
                <th>Booking Amount</th>
                <th>Payment Method</th>
                
            
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                <tr>
                <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['payment_date']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

