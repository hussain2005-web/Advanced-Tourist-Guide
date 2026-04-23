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
    <title>Packages</title>
    <!--swiper css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!---font awesome cdn link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!---custom css file link --->
    <link rel="stylesheet" href="css/style.css">






    
</head>
<body>

<?php include "menu.php"; ?>



<div class="heading" style="background:url(images/header-bg-2.jpg)">
<h1>packages</h1>
</div>

<!--packages section starts-->

<section class="packages">
    <h1 class="heading-title">top destinations</h1>

    <div class="box-container">

        <?php
        $sql1 = "SELECT * FROM package  order by p_id  desc";
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



    <div class="load-more"><span class="btn">load more</span></div>

</section>
<!--packages section ends-->

<?php include "footer.php"; ?>

    <!---swiper js link-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!----custom js file link-->
    <script src="js/script.js"></script>
</body>
</html>