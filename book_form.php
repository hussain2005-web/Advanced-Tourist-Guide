<?php
include 'config.php';

session_start();

if(isset($_POST['send'])) {
    // Retrieve form data
    $phone = $_POST['phone'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $total_price = $_POST['total_price'];

    // Check if any field is empty
    if(empty($phone) || empty($guests) || empty($arrivals) || empty($pid) || empty($uid) || empty($total_price)) {
        echo "Please fill in all fields.";
    } else {
        // Insert booking details into the database
        $booking_date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO booking (user_id, p_id, booking_date, arrival_date, num_guests, total_price) VALUES ('$uid', '$pid', '$booking_date', '$arrivals', '$guests', '$total_price')";
        if(mysqli_query($conn, $sql)){
            
            $sql1 = "INSERT INTO payment(`booking_id`, `user_id`, `payment_date`, `amount`, `payment_method`) VALUES (".mysqli_insert_id($conn).",".$uid.",'".date("Y/m/d")."',".$total_price.",'Credit Card')";
            mysqli_query($conn, $sql1);

            // Set booking message in session
            $_SESSION['booking_message'] = "Booking successful!";
            // Redirect user to home page
            header("Location: home.php");
            exit(); // Ensure script stops executing after redirection
        } else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "Form submission error.";
}
?>
