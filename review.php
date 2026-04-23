<?php
include 'config.php';

session_start();

if(isset($_POST['send'])) {
    // Retrieve form data
    $reviews = $_POST['reviews'];
    
    $uid = $_POST['uid'];
    
    // Check if any field is empty
    if(empty($reviews)) {
        echo "Please fill in all fields.";
    } else {
       
        $sql = "INSERT INTO review (user_id, review) VALUES ('$uid', '$reviews')";
        
        if(mysqli_query($conn, $sql)){
            // Set booking message in session
            $_SESSION['booking_message'] = "Review Submited successfully!";
            // Redirect user to home page
            header("Location: home.php");
            exit(); // Ensure script stops executing after redirection
        } else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo " submission error.";
}
?>
