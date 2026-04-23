<?php
include 'config.php';
session_start();

$message = array(); // Initialize an empty array to store error messages

if(isset($_POST['submit'])){
    // Escape user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);

    // Validate phone number
    if(strlen($phone) != 10 || !ctype_digit($phone)) {
        $message[] = 'Please enter a valid 10-digit phone number.';
    }

    // Validate password
    if(strlen($pass) < 8 || !preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/', $pass)) {
        $message[] = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.';
    }

    // Check if email already exists
    $select_email = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('Query failed');
    if(mysqli_num_rows($select_email) > 0){
        $message[] = 'Email address is already registered.';
    }

    // Check if phone number already exists
    $select_phone = mysqli_query($conn, "SELECT * FROM `users` WHERE phone = '$phone'") or die('Query failed');
    if(mysqli_num_rows($select_phone) > 0){
        $message[] = 'Phone number is already registered.';
    }

    // Check if password already exists
    $select_pass = mysqli_query($conn, "SELECT * FROM `users` WHERE password = '$pass'") or die('Query failed');
    if(mysqli_num_rows($select_pass) > 0){
        $message[] = 'Password is already in use.';
    }

    // If no validation errors, proceed with registration
    if(empty($message)){
        if($pass != $cpass){
            $message[] = 'Confirm password not matched!';
        } else {
            mysqli_query($conn, "INSERT INTO `users`(name, email, phone, password) VALUES('$name', '$email', '$phone','$cpass')") or die('Query failed');
            $message[] = 'Registered successfully!';
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            if(isset($_GET['redirect']) && $_GET['redirect'] == 'book'){
                header('location: book.php?pid='.$_GET['pid']);
            } else {
                header('location: home.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!--swiper css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <!---font awesome cdn link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!---custom css file link --->
    <link rel="stylesheet" href="css/style.css"> 
    <style>
        .error-message {
            font-size: 12px;
            color: red;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="form-container">
    <form action="" method="post">
        <h3>Register Now</h3>
        <input type="text" name="name" placeholder="Enter your name" required class="box">

        <input type="email" name="email" id="emailbox" placeholder="Enter your email" required class="box">
        <?php
        if(isset($message) && in_array('Email address is already registered.', $message)){
            echo '<div class="error-message">Email address is already registered.</div>';
        }
        ?>

        <input type="text" name="phone" id="emailbox" placeholder="Enter your phone number" required class="box">
        <?php
        if(isset($message) && in_array('Phone number is already registered.', $message)){
            echo '<div class="error-message">Phone number is already registered.</div>';
        }
        if(isset($message) && in_array('Please enter a valid 10-digit phone number.', $message)){
            echo '<div class="error-message">Please enter a valid 10-digit phone number.</div>';
        }
        ?>

        <div style="position:relative;">
            <input type="password" name="password" placeholder="Enter your password" required class="box" id="passwordField">
            <i class="fas fa-eye password-toggle" id="togglePassword"></i>
        </div>
        <?php
        if(isset($message) && (in_array('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.', $message))){
            echo '<div class="error-message">Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.</div>';
        }
        ?>

        <div style="position:relative;">
            <input type="password" name="cpassword" placeholder="Confirm your password" required class="box" id="confirmPasswordField">
            <i class="fas fa-eye password-toggle" id="toggleConfirmPassword"></i>
        </div>
        <?php
        if(isset($message) && in_array('Confirm password not matched!', $message)){
            echo '<div class="error-message">Confirm password not matched!</div>';
        }
        ?>

        <input type="submit" name="submit" value="Register Now" class="btn">

        <p>Already have an account? 

        <?php
        if(isset($_SESSION['user_id'])){
           echo'<a href="login.php">login now</a>';

        }else{
            if(isset($_GET['redirect'])){
                if($_GET['redirect']=='book'){
                    echo'<a href="login.php?redirect=book&pid='.$_GET["pid"].'">login now</a>';
                }
            }
            else{
                echo'<a href="login.php">login now</a>';

            }
        } 
       ?>

    </form>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('passwordField');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordField = document.getElementById('confirmPasswordField');

    togglePassword.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>