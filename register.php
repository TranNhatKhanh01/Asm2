<?php
include_once("connect.php");

if(isset($_POST['btnRegister'])){
    $uname = $_POST['Username'];
    $pwd = md5($_POST['txtPass1']);
    $fname = $_POST['Username'];
    $gender = $_POST['grpRender'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $Address = $_POST['Address'];
    $date = $_POST['slDate'];
    $month = $_POST['slMonth'];
    $year = $_POST['slYear'];

    $sql = "INSERT INTO `customer`(`Username`, 
    `Password`, `CustName`, `gender`, `Address`,
     `telephone`, `email`, `CusDate`, `CusMonth`, 
     `CusYear`, `ActiveCode`, `state`) VALUES (
         '$uname','$pwd','$fname',
         '$gender','$Address','$telephone',
         '$email',$date,$month,
         $year,'123','1')";

    if(!mysqli_query($conn,$sql)){
        echo "Error" .mysqli_error($conn);

    } else{
        header("Location: login.php");
        die();
    }
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="./css/style.css">
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
                                <a style="color: black; opacity:0.6;"href="login.php" class="nav-item nav-link">Login</a>
                            <?php
                        } ?></li>
                        <li style="opacity: 0.4;">|</li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="category.php">Category</a></li>
                        <li><a href="manager.php">Products Management</a></li>
                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" 
                onclick="menutoggle()">
            </div>
        </div>
    </div>
</header>
<div class="container">
        <div class="col-12">
        <h2 style="text-align: center;">Member Registration</h2>
			 	<form style="padding-left: 160px;" id="form1" name="form1" method="POST" action="" class="form-horizontal was-validated" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Username(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="Username" id="Username" class="form-control" placeholder="Username" value="" />
                                  <div class="valid-feedback">Correct</div>
                                  <div class="invalid-feedback">Wrong</div>
							</div>
                    </div>  
                      
                       <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass1" id="txtPass1" class="form-control" placeholder="Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group"> 
                            <label for="" class="col-sm-2 control-label">Confirm Password(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Confirm your Password"/>
							</div>
                       </div>     
                       
                       <div class="form-group">                               
                            <label for="lblFullName" class="col-sm-2 control-label">Customer name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="CustName" id="CustName" value="" class="form-control" placeholder="Enter Fullname"/>
							</div>
                       </div> 
                         
                          <div class="form-group">  
                            <label for="lblGioiTinh" class="col-sm-2 control-label">Gender(*):  </label>
							<div class="col-sm-10">                              
                                      <label class="radio-inline"><input type="radio" name="grpRender" value="0" id="grpRender"  />
                                      Male</label>
                                    
                                      <label class="radio-inline"><input type="radio" name="grpRender" value="1" id="grpRender" />
                                      
                                      Female</label>

							</div>
                          </div> 
                        <div class="form-group"> 
                            <label for="lblAddress" class="col-sm-2 control-label">Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="Address" id="Address" value="" class="form-control" placeholder="Address"/>
							</div>
                       </div>
                       <div class="form-group"> 
                            <label for="lblphone" class="col-sm-2 control-label">Phone(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="telephone" id="telephone" value="" class="form-control" placeholder="telephone"/>
							</div>
                       </div>  
                          <div class="form-group">      
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="email" name="email" id="email" value="" class="form-control" placeholder="Email"/>
							</div>
                       </div> 
                         
                          <div class="form-group"> 
                            <label for="lblNgaySinh" class="col-sm-2 control-label">Date of Birth(*):  </label>
                            <div class="col-sm-10 input-group">
                                <!-- <input type="date" id="txtBirth" name="txtBirth">  -->
                                <span class="input-group-btn">
                                  <select name="slDate" id="slDate" class="form-control" >
                						<option value="0">Choose Date</option>
										<?php
                                            for($i=1;$i<=31;$i++)
                                             {                                                
                                                 echo "<option value='".$i."'>".$i."</option>";
                                             }
                                        ?>
                				 </select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slMonth" id="slMonth" class="form-control">
                					<option value="0">Choose Month</option>
									<?php
                                        for($i=1;$i<=12;$i++)
                                         {
                                             echo "<option value='".$i."'>".$i."</option>";
                                         }
                          
                                    ?>
                				</select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slYear" id="slYear" class="form-control">
                                    <option value="0">Choose Year</option>
                                    <?php
                                        for($i=1970;$i<=2020;$i++)
                                         {
                                             echo "<option value='".$i."'>".$i."</option>";
                                         }
                                    ?>
                                </select>
                                </span>
                           </div>
                      </div>	
					<div class="form-group">
						<div class="col-6">
                            <br>
						      <input style="text-align: justify;" type="submit"  class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register"/>
                              <!-- <a href="index.php"><input type="exit"  class="btn btn-primary"value="Exit"/></a> -->
						</div>
                     </div>
				</form>
        </div>
</div>
    

