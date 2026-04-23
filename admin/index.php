<?php
include "conn.php";
include "header.php";
?>
<div class="container" id="container">
<div class="col-md-4 col-md-offset-4" id="loginBox">
<form action="" method="POST">
<h1 id="heading1">LOGIN</h1>
<?php
if(isset($_POST["login_btn"])){
    $login_email=$_POST["login_email"];
    $login_password=$_POST["login_password"];
    $sql1="select* from login where login_email='".$login_email."' and login_password = '".$login_password."'";
    $res1=mysqli_query($conn,$sql1) or die (mysqli_error($conn));
    $num1=mysqli_num_rows($res1);
    $row1 =mysqli_fetch_array($res1);
    if($num1>0){
		echo "Login Success";
		$_SESSION["userid"] = $row1["login_id"];
		header("location:dashboard.php");
    }else{
       echo "<h4 id='errtxt'>Login Failed</h4>";
	}
}	
?>
<input type="text" class="inputBox" name="login_email" placeholder="Email ID:" style="margin:10px auto">
<input type="password" class="inputBox" name="login_password" placeholder="Password:" style="margin:10px auto">
<input type="submit" class="inputBtn" name="login_btn" value="LOGIN" style="margin:10px auto;width:100%;">
<!--<p style="text-align:right;"><a href="">Forgot Password?</a></p>-->
<br>
</form>
</div>
</div>

<!--Footer-->
</div>
</body>
</html>