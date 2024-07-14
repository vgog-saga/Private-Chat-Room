<?php

include("db.php");
session_start();

if(isset($_POST["name"]) && isset($_POST["phone"])){
    
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $q="SELECT * FROM `people` WHERE  uname='$name' && phone='$phone'";
    if($rq=mysqli_query($db,$q)){
        if(mysqli_num_rows($rq)==1){
            $_SESSION["userName"]=$name;
            $_SESSION["phone"]=$phone;
            header("location: index.php");
        }else{
            $q="SELECT * FROM `people` WHERE phone='$phone'";
            if($rq=mysqli_query($db,$q)){
                if(mysqli_num_rows($rq)==1){
                    echo "<script>alert('phoneNo is already taken')</script>";
                }else{
                    $q="INSERT INTO `people`(`uname`, `phone`) VALUES ('$name','$phone')";
                    if($rq=mysqli_query($db,$q)){
                    $q="SELECT * FROM `people` WHERE  uname='$name' && phone='$phone'";
                    if($rq=mysqli_query($db,$q)){
                        if(mysqli_num_rows($rq)==1){
                            $_SESSION["userName"]=$name;
                            $_SESSION["phone"]=$phone;
                            header("location: index.php");
                        }   
                    }
                }   
            }
        }
    }
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatRoom</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>ChatRoom</h1>
    <div class="login">
    <h2>Login</h2>
    <p>Connect from here, no matter how far you are!!</p>
    <form action="" method="post">
        <h3>Username:</h3>
        <input type="text" placeholder="Enter your Short Name" name="name">
        <h3>Mobile No:</h3>
        <input type="number" name="phone" placeholder="Enter Your Mobile Number" min="1111111" max="999999999999">
        <button>Login / Register</button>
    </form>
</div>
</body>
</html>