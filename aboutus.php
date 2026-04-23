<?php

include 'config.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!--swiper css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!---font awesome cdn link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!---custom css file link --->
    <link rel="stylesheet" href="css/style.css">






    
</head>
<body>

<?php include "menu.php"; ?>



<div class="heading" style="background:url(images/header-bg-1.jpg)">
<h1>about us</h1>
</div>

<!--about section  starts-->


<section class="about">
    <div class="image">
        <img src="images/about-img.jpg" alt="">
    </div>

    <div class="content">
        <h3>why choose us?</h3>
        <p>When You Book With Us, You Can Rest Assured That You're In Good Hands. Our Team Of Travel Experts Are Available To Help You Plan Your Trip, Answer Your Questions, 
           And Provide You With Insider Tips And Recommendations To Make The Most Of Your Travels.</p>
        <p>We Offer Competitive Prices And No Hidden Fees. When You Rent With Us, You Can Rest Assured That The Price You See Is The Price You'll Pay, 
           With No Surprises Or Additional Charges.</p>
        <div class="icons-container">
            <div class="icons">
                <i class="fas fa-map"></i>
                <span>top destinations</span>
            </div>
            <div class="icons">
                <i class="fas fa-hand-holding-usd"></i>
                <span>affordable price</span>
            </div>
            <div class="icons">
                <i class="fas fa-headset"></i>
                <span>24/7 guide service</span>
            </div>
        </div>
    </div>
</section>
<section class="booking">
<form action="review.php" method="post" class="book-form" id="bookingForm" onsubmit="return validateForm()">
        <div class="flex">
            <div class="inputBox">
                <span>Review</span>
                <input type="textarea" placeholder="Enter Your Review" name="reviews" id="phone">
                <div id="phoneError" class="error"></div>
            </div>
            
            
        </div>
        <input type="hidden" name="uid" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
        <input type="submit" value="Submit" class="btn" name="send" >
    </form>
</section>
<!--about section  ends-->

<!--reviews section starts-->

<section class="reviews">
    
    <h1 class="heading-title"> clients reviews </h1>

    <div class="swiper reviews-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>Their service is really good and prompt. car quality is also 
                    excellent. Highly recommended.</p>
                <h3>Ajit Giri</h3>
                <span>traveler</span>
                <img src="images/pic-1.png" alt="">
            </div>

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>Reasonable rate, polite behaviour and excellent service, 
                   sure Highly recommended 👍</p>
                <h3>Anusha Kavlekar</h3>
                <span>traveler</span>
                <img src="images/pic-2.png" alt="">
            </div>

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>Reasonable rate, polite behaviour and excellent service, 
                   sure Highly recommended 👍</p>
                <h3>john deo</h3>
                <span>traveler</span>
                <img src="images/pic-3.png" alt="">
            </div>

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>Great service... have been taking transport for over 4 yrs, 
                    never faced any issues. Will surely recommend 👌</p>
                <h3>neha Sharma </h3>
                <span>traveler</span>
                <img src="images/pic-4.png" alt="">
            </div>

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>Their service is really good and prompt. car quality is also 
                    excellent. Highly recommended.</p>
                <h3>ayush varma</h3>
                <span>traveler</span>
                <img src="images/pic-5.png" alt="">
            </div>

            <div class="swiper-slide slide">
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>Reasonable rate, polite behaviour and excellent service, 
                   sure Highly recommended 👍</p>
                <h3>user</h3>
                <span>traveler</span>
                <img src="images/pic-6.png" alt="">
            </div>

        </div>

    </div>

</section>

<!--reviews section ends-->

<?php include "footer.php"; ?>

    <!---swiper js link-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!----custom js file link-->
    <script src="js/script.js"></script>
</body>
</html>