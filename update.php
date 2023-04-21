<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <h2 style="text-align: center;">Update Product</h2>
    <?php
        include_once("connect.php");
        // Load order information by ID
        if(isset($_GET['id'])){
            $oid = $_GET['id'];
            $sql = "select * from product where Product_ID = '$oid'";
            $re = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($re);
        }

        // Handle update
        if(isset($_POST['Update'])){
            $id = $_GET['id'];
            $name = mysqli_real_escape_string($conn,$_POST['Product_Name']);
            $price = mysqli_real_escape_string($conn,$_POST['Price']);
            $sdesc = mysqli_real_escape_string($conn,$_POST['SmallDesc']);
            $detaildesc = mysqli_real_escape_string($conn,$_POST['DetailDesc']);
            $date = mysqli_real_escape_string($conn,$_POST['ProDate']);
            $qty = mysqli_real_escape_string($conn,$_POST['Pro_qty']);
            $img = mysqli_real_escape_string($conn,$_POST['Pro_image']);
            $catid = mysqli_real_escape_string($conn,$_POST['Cat_ID']);

            $uSQL = mysqli_query($conn, "UPDATE product SET Product_Name ='{$name}',Price='{$price}',SmallDesc='{$sdesc}',DetailDesc='{$detaildesc}'
            ,ProDate='{$date}',Pro_qty='{$qty}',Pro_image='{$img}',Cat_ID='{$catid}'
            WHERE Product_ID='{$id}'");
            if($uSQL) {
                echo "<script>  
                    alert('You have successfully updated');
                    window.location = 'manager.php';
                </script>";
            } else{
                echo "Error: ".$insertQ. "<br>" . mysqli_error($conn);
            }
        }
    ?>
<!-- div content -->
<div class="page-content mt-4">
            <div class="card">
                <div class="card-content">
                    <div style="padding: 0px 350px;" class="card-body">
                        <form class="form form-vertical" method="POST" action="#">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Product ID</label>
                                            <input type="text" id="pid" class="form-control"
                                                name="product_id" placeholder="Product ID"
                                                value ="<?=$row['Product_ID']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Product Name</label>
                                            <input type="text" id="pname" class="form-control"
                                                name="Product_Name" placeholder="Product Name"
                                                value ="<?=$row['Product_Name']?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Price</label>
                                            <input type="number" id="Price" class="form-control"
                                                name="Price" placeholder="Price" value ="<?=$row['Price']?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Product Small Description</label>
                                            <input type="text" id="SmallDesc" class="form-control"
                                                name="SmallDesc" placeholder="Product Small Description"
                                                value ="<?=$row['SmallDesc']?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Product Description</label>
                                            <input type="text" id="DetailDesc" class="form-control"
                                                name="DetailDesc" placeholder="Product Description"
                                                value ="<?=$row['DetailDesc']?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Product Date</label>
                                            <input id="ProDate" class="form-control" type="date" name="ProDate" value ="<?=$row['ProDate']?>" placeholder="yyyy-mm-dd"/>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-info-vertical">Quantity</label>
                                            <input type="number" id="Pro_qty" class="form-control"
                                                name="Pro_qty" placeholder="Quantity" value ="<?=$row['Pro_qty']?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image-vertical">Image</label>
                                            <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="<?=$row['Pro_image']?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-vertical">Cat_ID</label>
                                            <input type="text" id="cat_id" class="form-control"
                                                name="Cat_ID" placeholder="Cat id" value ="<?=$row['Cat_ID']?>">
                                        </div>
                                        <br>
                                    </div>                                 
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" name="Update" >Submit</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1 rounded-pill">Reset</button><br>
                                     
                                    </div> 
                                    <a href="manager.php"><button type="button" class="btn btn-outline-primary">Back to index</button></a>
                                </div>
                            </div>
                        </form>
                    </div> <!--card body-->
                
                </div> <!--card content-->
            </div> <!--card-->
        </div><!--page content-->
</body>
<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/app.js"></script>
<script src="../assets/js/main.js"></script>
</html>