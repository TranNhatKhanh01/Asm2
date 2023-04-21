<link rel="stylesheet" href="./css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
include_once("connect.php");

if (isset($_REQUEST['ok'])) {
    $search = addslashes($_GET['search']);
    $query = "select * from product where Product_Name like '%$search%'";
    $sql = mysqli_query($conn,$query);
    $num = mysqli_num_rows($sql);
}

?>   

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li>
                    <?php
                        session_start();
                        if(isset($_SESSION['user'])){
                            if(time() - $_SESSION['timeout'] > 1800){
                                //logout
                                session_unset();
                                session_destroy();
                                header("Location: login.php");
                            }
                            else{
                                if($_SESSION['user'] == 'admin'){
                                ?>
                                    <a href="#" class="nav-item nav-link">Welcome, <?=$_SESSION['user']?></a>
                                    <a style="padding-left: 12px;" href="logout.php" class="nav-item nav-link">Logout</a> 
                                    <a style="padding-left: 12px;" href="manager.php" class="nav-item nav-link">Manager</a>
                                <?php
                                }
                                else{
                                    ?>
                                        <a href="#" class="nav-item nav-link">Welcome, <?=$_SESSION['user']?></a>
                                        <a style="padding-left: 12px;" href="logout.php" class="nav-item nav-link">Logout</a>
                                    <?php
                                    }
                                }
                            }
                        
                        else{
                            ?>
                                <a href="login.php" class="nav-item nav-link">Login</a>
                                <a style="padding-left: 12px;" href="register.php" class="nav-item nav-link">Register</a>
                            <?php
                        } ?></li>
                        <li style="opacity: 0.4;">|</li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                </ul>
            </nav>
            <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
        </div>
    </div>
    </div>

    <div class="small-container">

        <div class="row row-2">
            <h2>All Products</h2>
            <form style="display: inline-block;" action="search.php" method="get">
            <input type="text" name="search" value="<?=$_GET['search']?>" />
            <input  type="submit" name="ok" value="Search" />
            </form>
            
        </div>  

        <p>Number of products found: <?=$num?></p>
        <br>

        <div class="row">
        <?php
        if (isset($_REQUEST['ok'])) 
        {
            $search = addslashes($_GET['search']);
            if (empty($search)) {
                echo "<script>
                alert('Please enter the product you are looking for');
                window.location = 'products.php';
                </script>";
            } 
            else
            {
                if ($num > 0 && $search != "") 
                {
                while($row = mysqli_fetch_assoc($sql)){
                ?>
                    <div class="col-4">
                        <a href="products_detal.php?id=<?=$row['Product_ID']?>"><img src="images/<?=$row['Pro_image']?>"></a>
                        <h4><?=$row['Product_Name']?></h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>$<?=$row['Price']?></p>
                    </div>
                    <?php
                    }    
                    ?>    
                </div>
                <?php
                } 
                else {
                    echo "<script>
                    alert('No results were found');
                    window.location = 'products.php';
                    </script>";
                }
                ?>
            <?php
            }
            ?>
        <?php
        }
        ?>
        </div>
    </div>
    <!-- ------------footer----------- -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo-white.png">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and
                        Benefits of Sports Accessible to the Many</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube </li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="Copyright">Copyright 2022 - By QuangMinh</p>
        </div>
        <!-- ------------------- js for toggle menu-------------- -->
        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                }
                else {
                    MenuItems.style.maxHeight = "0px";
                }
            }

        </script>
</body>

</html>