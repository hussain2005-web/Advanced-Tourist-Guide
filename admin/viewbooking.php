<?php
@include 'conn.php';
$select = mysqli_query($conn, "SELECT * FROM booking ORDER BY p_id DESC");
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
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>User Id</th>
                <th>Package ID</th>
                <th>Booking Date</th>
                <th>Arrival Date</th>
                <th>No. Guest</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                <tr>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['p_id']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['arrival_date']; ?></td>
                    <td><?php echo $row['num_guests']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['status']; ?></td> <!-- Display numerical rating -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

