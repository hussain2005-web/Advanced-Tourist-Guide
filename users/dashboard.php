<?php
include "conn.php";
if(!isset($_SESSION["user_id"])){
	header("location:index.php");
}
include "header.php";
?>

<div class="container" id="container">
<div class="col-md-12" id= "navbar">
<a href="dashboard.php"></a>
<a href="../home.php" id="logo">Destiga</a>
<a href="logout.php" id="logoutBtn">LOGOUT</a>
</div>
<?php
include "menubar.php";
?>
<div class="col-md-10" id="content">
<?php
if(isset($_GET['page'])){
	include($_GET['page'].".php");
}else{
	include('homepage.php');
}
?>
</div>
</div>

<!--Footer-->
</div>
</body>
</html>