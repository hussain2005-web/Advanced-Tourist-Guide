<?php
@include 'conn.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve user ID
$user_id = $_SESSION['user_id'];

// Query to retrieve bookings for the logged-in user
$sql = "SELECT * FROM booking WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
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
    text-align: center;
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
  .my-bookings td a{
    background:#8e44ad;
    padding:10px 20px;
    border-radius:8px;
    border:0px;
    color:#fff;
    margin:20px auto;
    display:block;
    text-decoration:none;
    cursor:pointer;
  }
  .my-bookings td a:hover{
    background:red;
padding:10px 20px;
border-radius:8px;
border:0px;
color:#ffffff;
margin:20px auto;
display:block;
text-decoration:none;
cursor:pointer;
  }

  </style>
    <div class="my-bookings">
        <h1>My Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Package ID</th>
                    <th>Booking Date</th>
                    <th>Arrival Date</th>
                    <th>Number of Guests</th>
                    <th>Total Price</th>
                    <th colspan="2">Action</th>
                    
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each booking and display its details
                     while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['p_id']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['arrival_date']; ?></td>
                    <td><?php echo $row['num_guests']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td>
                      <?php 
                        if($row['status']=='confirmed'){
                        echo '<a href="dashboard.php?page=deletebooking&delete='.$row['booking_id'].'"><i class="fas fa-trash"></i>Cancel</a>';
                        }else {
                          echo '<a><i class="fas fa-trash"></i>Cancelled</a>';
                        }?>
                    </td>
                     
                </tr>
                   
                <?php } ?>
                
            </tbody>
        </table>
    </div>
