<?php

@include 'conn.php';

$msg = '';
if(isset($_POST['btnsubmit'])){
	$oldpass = $_POST['old_password'];
	$newpass = $_POST['new_password'];
    $confirm_newpass = $_POST['confirm_new_password'];

	if ($newpass !== $confirm_newpass) {
        $msg = "New password and confirm new password do not match.";
    } else {
			// Escape user inputs to prevent SQL injection
			$oldpass = mysqli_real_escape_string($conn, $oldpass);
			$newpass = mysqli_real_escape_string($conn, $newpass);

			

		$sql0 = "SELECT * FROM login WHERE login_password = '$oldpass'";
		$res0 = mysqli_query($conn, $sql0) or die(mysqli_error());
		$num0 = mysqli_num_rows($res0);
		if($num0 == 0){
			echo "Incorrect Password";
		}else{
			$sql1 = "UPDATE login SET login_password = '$newpass' WHERE login_password = '$oldpass'";
			$res1 = mysqli_query($conn, $sql1);
			echo "Password Updated Successfully.";
		}
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
	<link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->

</head>
<body>

<h2>Change Password</h2>

<form method="POST" action="" class="change-password-form">
    <label for="old_password">Old Password:</label><br>
    <input type="password" id="old_password" name="old_password" required><br><br>

    <label for="new_password">New Password:</label><br>
    <input type="password" id="new_password" name="new_password" required><br><br>

    <label for="confirm_new_password">Confirm New Password:</label><br>
    <input type="password" id="confirm_new_password" name="confirm_new_password" required><br><br>

    <input type="submit"  name="btnsubmit" value="Change Password">
</form>

<?php echo $msg; ?>

</body>
</html>
