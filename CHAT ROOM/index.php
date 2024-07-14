<?php
session_start();
include("addmsg.php");
if(isset($_SESSION["userName"]) && isset($_SESSION["phone"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatRoom</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <script src="js/script.js"></script>
    <h1>ChatRoom</h1>
    <div class="chat">
        <h2>welcome to ChatRoom <br><span><?= $_SESSION["userName"]?></span></h2>
        <div class="msg">
            

        </div>
        <div class="input_msg">
            <input type="text" placeholder="Write msg here" id="input_msg">
            <button onclick="update()">Send</button>
        </div>
    </div>
</body>
</html>
<?php
}else{
    header("location: login.php");
}?>