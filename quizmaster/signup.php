

<?php
include("logindb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 105vh;
            background-image: url("2 wallpaper.jp");
            background-size: cover;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        .login-container h5 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        h5{
            color:green;
        }
        .login-container p {
            text-align: left;
            font-weight: bold;
            margin: 10px 0 5px;
            color: #444;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .login-container input:focus {
            border-color: #667eea;
            outline: none;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background: #667eea;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .login-container button:hover {
            background: #764ba2;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h5>Registration</h5>
        <?php
        if(isset($_GET["Message"])){
            echo"<h5 id='message' style='color:green'>".$_GET["Message"]."</h5>";
            echo "
            <script>
                setTimeout(function() {
                    var message = document.getElementById('message');
                    if (message) {
                        message.style.display = 'none';
                    }
                }, 3000); // 5000ms = 5 seconds
            </script>";
        }if(isset($_GET["Message1"])){
            echo"<h4 id='message' style='color:red'>".$_GET["Message1"]."</h4>";
            echo "
            <script>
                setTimeout(function() {
                    var message = document.getElementById('message');
                    if (message) {
                        message.style.display = 'none';
                    }
                }, 3000); // 5000ms = 5 seconds
            </script>";
        }
        
        ?>
        <form action="datastore.php" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter your Name" required>
            
            <p>User ID</p>
            <input type="text" name="userid" placeholder="Enter your ID" required>
            
            <p>Password</p>
            <input type="password" name="password" placeholder="Set your Password" required>
            
            <p>Confirm Password</p>
            <input type="password" name="confirm_password" placeholder="Confirm your Password" required>
            
            <p>User Email</p>
            <input type="email" name="email" placeholder="Enter your Email" required>
            <button type="submit" name="login">Register</button>
        </form>
    </div>
</body>
</html>