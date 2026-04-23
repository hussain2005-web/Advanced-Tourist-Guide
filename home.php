
<?php
include 'config.php';
session_start();

// Check if booking message session variable is set
if(isset($_SESSION['booking_message'])) {
    // Echo the booking message inside a styled container with a close button
    echo '<div class="booking-message">' . $_SESSION['booking_message'] . '<button onclick="hideBookingMessage()">Close</button></div>';
    // Unset the session variable to remove the message after displaying
    unset($_SESSION['booking_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destiga</title>
    <!--swiper css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!---font awesome cdn link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!---custom css file link --->
    <link rel="stylesheet" href="css/style.css">


</head>
<body>

<?php include "menu.php"; ?>

    <!--home section starts-->
    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background: url(images/home-slide-1.jpg) no-repeat;">
                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>travel around the world</h3>
                        <a href="package.php" class="btn">discover more</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(images/home-slide-2.jpg) no-repeat;">
                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>discover the new places</h3>
                        <a href="package.php" class="btn">discover more</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(images/home-slide-3.png) no-repeat;">
                    <div class="content">
                        <span>explore, discover, travel</span>
                        <h3>make your tour worthwhile</h3>
                        <a href="package.php" class="btn">discover more</a>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!--home section ends-->

    <!--services sesction starts-->

<section class="services">
    
    <h1 class="heading-title"> our services </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/icon-1.png" alt="">
            <h3>Adventure</h3>
        </div>

        <div class="box">
            <img src="images/icon-2.png" alt="">
            <h3>Tour Guide</h3>
        </div>

        <div class="box">
            <img src="images/icon-3.png" alt="">
            <h3>Trekking</h3>
        </div>

        <div class="box">
            <img src="images/icon-4.png" alt="">
            <h3>Camp Fire</h3>
        </div>

        <div class="box">
            <img src="images/icon-5.png" alt="">
            <h3>Off Road</h3>
        </div>

        <div class="box">
            <img src="images/icon-6.png" alt="">
            <h3>Camping</h3>
        </div>

    </div>
</section>

    <!--services section ends-->




<!--home about section starts-->

<section class="home-about">
    <div class="image">
        <img src="images/about-img.jpg" alt="">
    </div>

    <div class="content">
        <h3>about us</h3>
        <p>Welcome to Destiga, your passport to unparalleled adventures and unforgettable journeys!
           At Destiga, we understand that travel is not just about reaching a destination;
           it's about embracing the spirit of exploration, immersing yourself in diverse cultures,
           and creating cherished memories that last a lifetime. </p>
        <a href="aboutus.php" class="btn">read more</a>
    </div>
</section>

<!--home about section ends-->

<!--home packages section starts-->

<section class="home-packages">
    <h1 class="heading-title"> our packages </h1>

    <div class="box-container">
        <?php
        $sql1 = "SELECT * FROM package  order by p_id  desc limit 3";
        $res1 = mysqli_query($conn,$sql1);
        while($row1=mysqli_fetch_array($res1))
        {
                // Calculate discounted price
            $discountedPrice = $row1['p_price'];
            if ($row1['p_discount'] > 0) {
                $discount = (int)$row1["p_discount"];
                $discountedPrice = $row1["p_price"] - ($discount * $row1["p_price"] / 100);
            }

            echo'
            <div class="box">
                <div class="image">
                    <img src="admin/uploaded_images/'.$row1['p_image'].'">
                </div>

                <div class="content">
                    <h3>'.$row1['p_name'].'</h3>
                    <p>'.$row1['p_description'].'</p>
                    <p>Price: &#8377;' . $discountedPrice . ' per person</p>';         
                    if(isset($_SESSION['user_id'])){
                        echo'<a href="book.php?pid='.$row1['p_id'].'" class="btn">book now</a>';
                    }
                    else{
                        echo'<a href="login.php?redirect=book&pid='.$row1['p_id'].'" class="btn">book now</a>';
    
                    }
                    echo '</div>
            </div>
            ';
        }
        ?>
    </div>

    <div class="load-more"><a href="package.php" class="btn">load more</a></div>

</section>
<!--home packages section ends-->

<!--home offer section starts

<section class="home-offer">
    <div class="content">
        <h3>upto 50% off</h3>
        <p></p>
        <a href="book.php" class="btn">book now</a>
    </div>
</section>

home offer section ends-->

<?php include "footer.php"; ?>



<script>
    // Function to hide the booking message when Close button is clicked
    function hideBookingMessage() {
        var bookingMessage = document.querySelector('.booking-message');
        if (bookingMessage) {
            bookingMessage.style.display = 'none'; // Hide the message container
        }
    }
</script>

    <!---swiper js link-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!----custom js file link-->
    <script src="js/script.js"></script>
</body>
</html>