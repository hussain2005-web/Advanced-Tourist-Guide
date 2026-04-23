<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

@include 'conn.php';

$id = $_GET['edit']; 

$select = mysqli_query($conn, "SELECT * FROM package WHERE p_id = ".(int)$id);
$row = mysqli_fetch_array($select);

if(isset($_POST['update_package'])) {
    $pname = mysqli_real_escape_string($conn, $_POST['pck_name']);
    $pdescription = mysqli_real_escape_string($conn, $_POST['pck_description']);
    $prating = mysqli_real_escape_string($conn, $_POST['pck_rating']);
    $photel = mysqli_real_escape_string($conn, $_POST['pck_hotel']);
    $pprice = mysqli_real_escape_string($conn, $_POST['pck_price']);
    $pdiscount = mysqli_real_escape_string($conn, $_POST['pck_discount']);
    $pplaces = mysqli_real_escape_string($conn, $_POST['pck_places']);
    
    // Check if a new image is uploaded
    if(isset($_FILES['pck_image']) && $_FILES['pck_image']['error'] == 0) {
        $image_name = $_FILES['pck_image']['name'];
        $temp_name = $_FILES['pck_image']['tmp_name'];
        $image_path = "uploaded_images/".$image_name;
        
        // Move the uploaded image to the "uploaded_images" folder
        if(move_uploaded_file($temp_name, $image_path)) {
            // Update the image path in the database query
            $sql1 = "UPDATE package SET 
                p_image='$image_name', 
                p_name='$pname', 
                p_description='$pdescription', 
                p_places='$pplaces', 
                p_hotel='$photel', 
                p_price=$pprice, 
                p_discount=$pdiscount, 
                p_rating='$prating' 
                WHERE p_id=$id";
            
            $res1 = mysqli_query($conn, $sql1);
            
            if($res1) {
                // Redirect to the dashboard after successful update
                header("location:dashboard.php?page=update");
                exit(); // Exit to prevent further execution
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        // If no new image is uploaded, update other package details only
        $sql1 = "UPDATE package SET 
            p_name='$pname', 
            p_description='$pdescription', 
            p_places='$pplaces', 
            p_hotel='$photel', 
            p_price=$pprice, 
            p_discount=$pdiscount, 
            p_rating='$prating' 
            WHERE p_id=$id";
        
        $res1 = mysqli_query($conn, $sql1);
        
        if($res1) {
            header("location:dashboard.php?page=update");
            exit(); // Exit to prevent further execution
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
?>

<div class="container">
    <div id="formBox">
        <form action="" method="post" enctype="multipart/form-data">
            <h3 id="">Update Package</h3>
            <input type="text" value="<?php echo htmlspecialchars($row['p_name']); ?>" name="pck_name" class="inputBox">
            <input type="text" value="<?php echo htmlspecialchars($row['p_description']); ?>" name="pck_description" class="inputBox">
            <input type="text" value="<?php echo htmlspecialchars($row['p_places']); ?>" name="pck_places" class="inputBox">
            <input type="text" value="<?php echo htmlspecialchars($row['p_hotel']); ?>" name="pck_hotel" class="inputBox">
            <input type="text" value="<?php echo htmlspecialchars($row['p_price']); ?>" name="pck_price" class="inputBox">
            <input type="text" value="<?php echo htmlspecialchars($row['p_discount']); ?>" name="pck_discount" class="inputBox">
            <input type="text" value="<?php echo htmlspecialchars($row['p_rating']); ?>" name="pck_rating" class="inputBox">
            <img src="uploaded_images/<?php echo htmlspecialchars($row['p_image']); ?>" width="120px" height="auto" />
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="pck_image" class="inputBox">
            <input type="submit" class="inputBtn" name="update_package" value="Update Package">
        </form>
    </div>
</div>
