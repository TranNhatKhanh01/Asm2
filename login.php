<?php
include_once("connect.php");
session_start();

if(isset($_POST['btnLogin'])){
    $uname = $_POST['Username'];
    $pwd = md5($_POST['Password']);
    $sql = "SELECT Username, Password, state FROM customer WHERE Username = '$uname' and Password = '$pwd'";
    $re = mysqli_query($conn,$sql);
    if(mysqli_num_rows($re) > 0 ){
        $_SESSION['user'] = $uname;
        $_SESSION['timeout'] = time();
        header("Location: index.php");
    } else{
        echo "<script>  
        alert('Wrong username or password');
    </script>";
    }
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body {
            height: 100%;
        }

        .form-login {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
    </style>

    <!-- Bootstrap5 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    
    <title>BS5 Login</title>
</head>
<body class="d-flex text-center">
    <form class="form-login" method="POST" action="">
        <h1 class="h3 mb-3 font-weight-normal"> L o g i n</h1>
        <!-- 'sr-only' will hide the text : 'Email Address'. So, 'Email Address' will be invisible -->
        <label for="Username" class="sr-only">Username</label>
        <!-- 'autofocus' will highlight the input column initially -->
        <input 
            type="text" 
            id="Username"
            name="Username"
            class="form-control mb-2"
            placeholder="Username"
            required
            autofocus
        >
        <!-- 'sr-only' will hide the text : 'Password'. So, 'Password' will be invisible -->
        <label for="inputPassword" class="sr-only">Password</label>
        <input 
            type="password" 
            id="Password"
            name="Password"
            class="form-control mb-2"
            placeholder="Password"
            required
        >
        <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> -->
        <!-- 'btn-block' will make the button wider -->
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogin">
            Login
        </button>
        <br>
        <a href="index.php">Exit</a>
    </form>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>