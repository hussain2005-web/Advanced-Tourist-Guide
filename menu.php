    <!--header section starts-->
    <section class="header">
        <a href="home.php" class="logo">Destiga</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="aboutus.php">About</a>
            <a href="package.php">Package</a>

            <?php if(!isset($_SESSION['user_id'])){
                echo '<a href="login.php">Login</a>';
                echo '<a href="register.php">Register</a>';
            }else {
                echo '<a href="users/">MyAccount</a>';}?>

        </nav>
    
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>

    </section>


    <!--header section ends-->