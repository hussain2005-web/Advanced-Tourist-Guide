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
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each booking and display its details
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['booking_id'] . "</td>";
                    echo "<td>" . $row['p_id'] . "</td>";
                    echo "<td>" . $row['booking_date'] . "</td>";
                    echo "<td>" . $row['arrival_date'] . "</td>";
                    echo "<td>" . $row['num_guests'] . "</td>";
                    echo "<td>" . $row['total_price'] . "</td>";
                    // Add more columns as needed
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
