<?php
    @include 'conn.php';
    if(isset($_POST['add_package'])){
    $pck_name = $_POST['pck_name'];
    $pck_description = $_POST['pck_description'];
    $pck_places = $_POST['pck_places'];
    $pck_hotel = $_POST['pck_hotel'];
    $pck_price = $_POST['pck_price'];
    $pck_discount = $_POST['pck_discount'];
    $pck_rating = isset($_POST['pck_rating']) ? max(0, min(5, $_POST['pck_rating'])) : 0;
    $pck_image = $_FILES['pck_image']['name'];
    $pck_image_tmp_name = $_FILES['pck_image']['tmp_name'];
    $pck_image_folder = 'uploaded_images/'.$pck_image;
    if(empty($pck_name) || empty($pck_description) || empty($pck_image) )
    {
        $message[]= 'please fill out all fields';
    }
    else{
        $insert = "INSERT INTO package (p_name, p_description, p_places, p_hotel, p_price, p_discount, p_rating, p_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssssssss", $pck_name, $pck_description, $pck_places, $pck_hotel, $pck_price, $pck_discount, $pck_rating, $pck_image);
        
        // Execute the statement
        $upload = mysqli_stmt_execute($stmt);
        if($upload)
        {
        move_uploaded_file($pck_image_tmp_name, $pck_image_folder);
        $message[] = 'new package added successfully!!!';
        header('location:dashboard.php?page=update');
        }
        else{
        $message[]= 'something went wrong try again 6';
        }
        mysqli_stmt_close($stmt);

    }
}
?>
<?php
    if(isset($message)){
        foreach($message as $message){
            echo'<span class="message">'.$message.'</span>';
        }
    }
?>
<div>
<div id="formBox">
<form action="" method="post" enctype="multipart/form-data">
<h3 id="">Add New Package</h3>

<input type="text" placeholder="Enter Name of package" name="pck_name" class="inputBox">
<input type="text" placeholder="Enter Description of package" name="pck_description" class="inputBox">
<input type="text" placeholder="Enter Places in package" name="pck_places" class="inputBox">
<input type="text" placeholder="Enter Hotel name" name="pck_hotel" class="inputBox">
<input type="text" placeholder="Enter Price of package" name="pck_price" class="inputBox">
<input type="text" placeholder="Enter Discount" name="pck_discount" class="inputBox">
<input type="text" placeholder="Enter Rating (0-5)" name="pck_rating" class="inputBox">
<input type="file" accept="image/png, image/jpeg, image/jpg" name="pck_image" class="inputBox">
<input type="submit" class="inputBtn" name="add_package" value="Add Package">
</form>
</div>


</div>