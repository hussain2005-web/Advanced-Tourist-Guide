<?php

include 'config.php';

session_start();

$pid = $_GET['pid'];
$sql1= "select * from package where p_id=".$pid;
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($res1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <!--swiper css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!---font awesome cdn link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!---custom css file link --->
    <link rel="stylesheet" href="css/style.css">






    
</head>
<body>

<?php include "menu.php"; ?>



<div class="heading" style="background:url('admin/uploaded_images/<?php echo $row1['p_image'];?>')">
<h1>book now</h1>
</div>

<section class="booking">
    <!-- Package details section with appropriate class names -->
    <section class="booking-details">
        <div class="center-column">
            <div class="name-description">
                <h1 class="heading-title"><?php echo $row1['p_name'];?></h1>
                <h4 class="heading-small"><?php echo $row1['p_description'];?></h4>
            </div>
        </div>
        <div class="details-container">
            <div class="left-details">
                <h4 class="heading-para">Destination: <?php echo $row1['p_places'];?></h4>
                <h4 class="heading-para">Hotels: <?php echo $row1['p_hotel'];?></h4>
            </div>
            <div class="right-details">

                <h4 class="heading-para">Price: <?php 
                    if($row1['p_discount'] > 0) {
                        echo "<span class='heading-strike'> &#8377; ".$row1['p_price']."</span>";
                        $ogprice = (int)($row1["p_price"]);
                        $discount = (int)($row1["p_discount"]);
                        $newprice = $ogprice-$discount*$ogprice/100;
                        echo "&#8377;".$newprice;
                    }
                ?>/Person</h4>
                
                <h4 class="heading-para">Rating: 
                    <?php
                    // Convert numerical rating to star pattern
                    $rating = intval($row1['p_rating']);
                    for ($i = 0; $i < 5; $i++) {
                        if ($i < $rating) {
                            echo '<i class="fas fa-star"></i>'; // Full star
                        } else {
                            echo '<i class="far fa-star"></i>'; // Empty star
                        }
                    }
                    ?>
                </h4>
                
            </div>
        </div>
    </section>



    <!-- Booking form section -->
    <form action="book_form.php" method="post" class="book-form" id="bookingForm" onsubmit="return validateForm()">
        <div class="flex">
            <div class="inputBox">
                <span>phone :</span>
                <input type="text" placeholder="enter your number" name="phone" id="phone">
                <div id="phoneError" class="error"></div>
            </div>
            <div class="inputBox">
                <span>how many :</span>
                <input type="text" placeholder="number of guests" name="guests" id="guests" oninput="calculateTotal()">
                <div id="guestsError" class="error"></div>
            </div>
            <div class="inputBox">
                <span>arrivals :</span>
                <input type="date"name="arrivals" id="arrivals">
                <div id="arrivalsError" class="error"></div>
            </div>
            <div class="inputBox">
                <span>Total Price:</span>
                <input type="text" name="total_price" id="totalPrice" readonly>
            </div>
        </div>
        <input type="hidden" name="pid" value="<?php echo  $_GET['pid'];?>">
        <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id'];?>">
        <input type="submit" value="book" class="btn" name="send">
    </form>
</section>

<?php include "footer.php"; ?>

<script>
    function calculateTotal() {
        var discountedPricePerPerson = <?php echo $newprice; ?>;
        var guests = document.getElementById('guests').value;
        var totalPrice = discountedPricePerPerson * guests;
        document.getElementById('totalPrice').value = totalPrice.toFixed(2);
    }

    function validateForm() {
    var phone = document.getElementById('phone').value;
    var guests = document.getElementById('guests').value;
    var arrivals = document.getElementById('arrivals').value;
    var totalPrice = document.getElementById('totalPrice').value;

    var isValid = true;

    // Validate phone
    if (phone == "") {
        document.getElementById('phoneError').innerHTML = "Please enter your phone number.";
        isValid = false;
    } else if (!/^\d{10}$/.test(phone)) { // Validate if phone has 10 digits
        document.getElementById('phoneError').innerHTML = "Please enter a valid 10-digit phone number.";
        isValid = false;
    } else {
        document.getElementById('phoneError').innerHTML = "";
    }

    // Validate guests
    if (guests == "" || guests <= 0) { // Check if guests is empty or negative
        document.getElementById('guestsError').innerHTML = "Please enter a valid number of guests.";
        isValid = false;
    } else {
        document.getElementById('guestsError').innerHTML = "";
    }

    // Validate arrivals
    var currentDate = new Date();
    var selectedDate = new Date(arrivals);
    if (arrivals == "" || selectedDate < currentDate) { // Check if arrivals date is in the past or empty
        document.getElementById('arrivalsError').innerHTML = "Please select a valid future arrival date.";
        isValid = false;
    } else {
        document.getElementById('arrivalsError').innerHTML = "";
    }

    // Return false if any field is empty or invalid
    return isValid;
}

</script>

    <!---swiper js link-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!----custom js file link-->
    <script src="js/script.js"></script>
</body>
</html>