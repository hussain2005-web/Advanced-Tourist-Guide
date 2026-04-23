
<?php

    $connection = mysqli_connect('localhost','root','','travel');

    if(isset($_POST['add_package'])){
        $pck_name = $_POST['pck_name'];
        $pck_description = $_POST['pck_description'];
        $pck_rating = $_POST['pck_rating'];
        $pck_days = $_POST['pck_days'];
        $pck_hotel = $_POST['pck_hotel'];
        $pck_image = $_FILES['pck_image']['name'];
        $pck_image_tmp_name = $_FILES['pck_image']['tmp_name'];
        $pck_image_folder = 'uploaded_images/'.$pck_image;
        

        $request = " insert into package(p_name, p_description, p_rating, p_days, p_hotel, p_image) values ('$pck_name','$pck_description','$pck_rating','$pck_days','$pck_hotel','$pck_image')";
        
        mysqli_query($connection, $request);


        header('addpck.php');
    }else{
        echo 'something went wrong try again';
    }

?>



















