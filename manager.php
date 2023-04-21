<link rel="stylesheet" href="./css/style.css">
<title>Manager</title>

<?php
    include_once("connect.php");
?>
<header>
<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="./images/logo-1.png" width="125px"></a>
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
                        <li><a href="category.php">Category</a></li>
                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" 
                onclick="menutoggle()">
            </div>
        </div>
    </div>
</header>
<body>
<div id="main">
        <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
       
                <div style="text-align: center;" className="page-heading pb-2 mt-4 mb-2 ">
                    <h1>Manager</h1> 
                    <a href="insert.php"><button type="button" class="btn btn-outline-primary">Insert</button></a>
                </div>
                <div class="page-content">
                <div class="btn-group" role="group" aria-label="Basic outlined example">

                
        <?php
            $sql1 = "SELECT * from product";
            $rel1 = mysqli_query($conn,$sql1);
        ?>
               
                </div>
                <div class="container mb-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Category ID</th>
                            <th style="text-align: center;" scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($rel1) ) {
                            ?>
                            <tr id="table">
                                <td id="table"><?=$row['Product_ID']?></td>
                                <td id="table"><?=$row['Product_Name']?></td>
                                <td id="table"><?=$row['Price']?></td>
                                <td style="text-align: left;"  id="table"><?=$row['DetailDesc']?></td>
                                <td id="table"><?=$row['Pro_qty']?></td>
                                <td id="table"><?=$row['Cat_ID']?></td>
                                <td>
                                    <a href="update.php?id=<?=$row['Product_ID']?>" class="btn btn-warning rounded-pill">Update</a> 
                                </td>
                                <td>
                                    <a href="delete.php?id=<?=$row['Product_ID']?>" class="btn btn-warning rounded-pill">Delete</a> 
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
                <br>
                <br>
    </div>

    <!-- footer -->
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
            <p class="Copyright">Copyright 2022 - By NhatKhanh</p>
        </div>
    </div>
</body>
<?php