<?php
$query = "SELECT CustName, Address, email, telephone
        FROM customer
        WHERE Username = '". $_SESSION["uname"] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$uname = $_SESSION["uname"];
$email = $row["email"];
$fullname = $row["CustName"]
$address = $row["Address"];
$telephone = $row["telephone"];
?>
<div class = "form-group">
    <label for="IblEmail" class="col-sm-2 control-label">Email(*)</label>
    <div class = "col-sm10">
        <label>form-control" style="font-weight:400"<?php echo $email; ?></label>
    </div>
</div>
<div class = "form-group">
    <label for="IblHoten" class="col-sm-2 control-label">Full Name(*)</label>
    <div class = "col-sm10">
        <input type="text" name="txtFullname" id="txtFullname" value="<?php echo $fullname;?>"
        class = "form-control" placeholder="Enter Fullname, please"/> 
    </div>
</div>