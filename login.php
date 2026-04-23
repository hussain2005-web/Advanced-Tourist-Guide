<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
    $row = mysqli_fetch_array($select_users);
    if(mysqli_num_rows($select_users) > 0){
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        if(isset($_GET['redirect'])){
            if($_GET['redirect']=='book'){
                header('location:book.php?pid='.$_GET['pid']);
            }
        }else{
            header('location:home.php');
        }

    }else{
        $message[] = 'Incorrect email or password!';

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--swiper css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!---font awesome cdn link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!---custom css file link --->
    <link rel="stylesheet" href="css/style.css"> 
    <style>
        .password-container {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>

<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
        <span>'.$message.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
    ';
    }
}
?>

<div class="form-container">
    <form action="" method="post">
        <h3>Login Now</h3>
        <input type="email" name="email" id="emailbox" placeholder="Enter Your Email" required class="box">
        <div class="password-container">
            <input type="password" name="password" placeholder="Enter Your Password" required class="box" id="passwordField">
            <i class="fas fa-eye password-toggle" id="togglePassword"></i>
        </div>
        <input type="submit" name="submit" value="Login Now" class="btn">
        <p>Don't have an account? 
        <?php
        if(isset($_SESSION['user_id'])){
           echo'<a href="register.php">Register Now</a>';
        }else{
            if(isset($_GET['redirect'])){
                if($_GET['redirect']=='book'){
                    echo'<a href="register.php?redirect=book&pid='.$_GET["pid"].'">Register Now</a>';
                }
            }else{
                echo'<a href="register.php">Register Now</a>';
            }
        } 
       ?>
        </p>
    </form>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('passwordField');

    togglePassword.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>
