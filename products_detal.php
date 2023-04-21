<?php
include_once("connect.php");

if(isset($_GET['id'])){
    $sql = "SELECT DetailDesc from product where Product_ID = '".$_GET['id']."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($res);
  }
  
  else if(isset($_GET['pid']) && isset($_GET['quantity_input'])){
    echo "<script>
    window.location = 'cart.php?pid=".$_GET['pid'].
    "&qty=".$_GET['quantity_input']."' </script>";
  }
  else{
    header("Location: index.php");
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printd T-Shirt - RedStore</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script></script> -->
</head>

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
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
    </div>

    <!-- ---------- single Products detail ----------- -->

    <div class="small-container single-product" method="post">
        <div class="row">
        <?php
            $sql1 = "SELECT * from product where Product_ID='".$_GET['id']."'";
            $re1 = mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($re1);
            
        ?>
            <div class="col-2">
                <!-- Big image -->
                <p style="text-align:center;"><img src="./images/<?=$row1['Pro_image']?>" width="85%"  id="productImg"></p>

                <!-- Small image -->
                <div style="text-align:center;" class="small-img-row">
                    <?php
                        $sql5 = "SELECT * from category where Cat_Des='".$_GET['id']."'";
                        $re5 = mysqli_query($conn,$sql5);
                        while($row5 = mysqli_fetch_array($re5)) {
                    ?>
                        <div class="small-img-rol">
                            <img src="./images/<?=$row5['Gallery']?>" width="100%" class="small-img">
                        </div> 
                        <?php
                            }
                        ?>
                </div>
                
            </div>

            <!-- php -->

            <div class="col-2" onsubmit="return checkValidate">
                <p>Home / T-Shirt</p>
                <h1 class="name" id="name"><?=$row1['Product_Name']?></h1>
                <h4 class="price" id="price">$<?=$row1['Price']?></h4>
                <select class="size" id="size">
                    <!-- <option>Select Size</option> -->
                    <option>XXL</option>
                    <option>XL</option>
                    <option>Large</option>
                    <option>Medium</option>
                    <option>Small</option>
                </section>
                    <input type="number" value="1" class="qty" id="qty">
                    <a href="cart.php?pid=<?=$row1['Product_ID']?>" class="btn btn-warning me-1 mb-1 rounded-pill">Add to Cart</a>
                    <!-- <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" name="Insert">Add To Cart</button> -->
                    <br>
                    <br>
        
                    <h3>Product Detail
                        <i class="fa fa-indent"></i>
                    </h3>
                    <br>
                    <?php
                       $sql2 = "SELECT * from product where Product_ID = '".$_GET['id']."'";
                       $res2 = mysqli_query($conn,$sql2);
                       $row2 = mysqli_fetch_array($res2);
                    ?>
                    <p style="text-align: justify;" class="detaildesc"><?=$row2['DetailDesc']?></p>
                    
            </div>
        </div>
    </div>
    <br>
    <!-- ----- title------------- -->
    <div class="small-container">
        <div class="row row2">
            <h2>Relate Products</h2>
            <!-- <p>View More</p> -->
        </div>
    </div>

<!-- ---------------Products----------------- -->
    <div class="small-container">

        <div class="row">
        <?php
        $sql = "select * from Product";
        $re = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($re)){
        ?>
            <div class="col-4" style="padding-top: 10px;">
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
        <!-- <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div> -->
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
        <!-- <script>
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

        </script> -->

<!-- ------------------- JS for  product gallery------------------------         -->
        <script>
            var ProductImg = document.getElementById("productImg");
            var SmallImg = document.getElementsByClassName("small-img");

            SmallImg[0].onclick = function()
            {
                ProductImg.src = SmallImg[0].src;
            }
            SmallImg[1].onclick = function()
            {
                ProductImg.src = SmallImg[1].src;
            }
            SmallImg[2].onclick = function()
            {
                ProductImg.src = SmallImg[2].src;
            }
            SmallImg[3].onclick = function()
            {
                ProductImg.src = SmallImg[3].src;
            }

        </script>
</body>

</html>