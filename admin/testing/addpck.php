

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add package</title>
        <!---fon awesome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!---custom css link-->
        <link rel="stylesheet" href="css/style1.css">
    </head>
    <body>
    
        <div class="container">
            <div class="admin-form-container">
                <form action="addpckform1.php" method="post" enctype="multipart/form-data">
                     <h3>Add New product</h3>
                     
                     <input type="text" placeholder="Enter name of location" name="pck_name" class="box">
                     <input type="text" placeholder="Enter description of location" name="pck_description" class="box">
                     <input type="text" placeholder="Enter rating of location" name="pck_rating" class="box">
                     <input type="text" placeholder="Enter no. of days of tour" name="pck_days" class="box">
                     <input type="text" placeholder="Enter name of hotel" name="pck_hotel" class="box">
                     <input type="file" accept="image/png, image/jpeg, image/jpg" name="pck_image" class="box">
                     <input type="submit" class="btn" name="add_package" value="Add Package">
                     


                </form>
            </div>
        </div>

    </body>

</html>