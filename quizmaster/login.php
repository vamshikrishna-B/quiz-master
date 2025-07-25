<?php
include("logindb.php");
include("datastore.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(45deg,rgb(20, 70, 60), #00cec9), url("image.png");
    background-size: cover;
    background-position: center;
    background-blend-mode: multiply;
    
}

.login-container {
    background: rgba(255, 255, 255, 0.96);
    padding: 2.5rem;
    border-radius: 1.5rem;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    width: 440px;
    transition: transform 0.3s ease;
}

.login-container:hover {
    transform: translateY(-5px);
}

h2 {
    margin-bottom: 2rem;
    color: #2d3436;
    font-size: 1.8rem;
    font-weight: 600;
    text-align: center;
}

.input-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.input-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #636e72;
    font-size: 0.9rem;
    font-weight: 500;
}

.input-group input {
    width: 100%;
    padding: 0.9rem 1.2rem;
    padding-left: 2.8rem;
    border: 2px solid #dfe6e9;
    border-radius: 0.8rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.input-group input:focus {
    border-color: #00b894;
    box-shadow: 0 0 0 3px rgba(0, 184, 148, 0.1);
}

.input-group i {
    position: absolute;
    left: 1rem;
    bottom: 0.9rem;
    color: #636e72;
    font-size: 1.1rem;
}

button {
    width: 100%;
    padding: 1rem;
    background: #00b894;
    color: white;
    border: none;
    border-radius: 0.8rem;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background: #00cec9;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 206, 201, 0.3);
}

.register-link {
    margin-top: 1.5rem;
    text-align: center;
    font-size: 0.9rem;
    color: #636e72;
}

.register-link a {
    color: #00b894;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.register-link a:hover {
    color: #00cec9;
}

h4#message {
    background: #ffe3e3;
    color: #d63031;
    padding: 0.8rem;
    border-radius: 0.8rem;
    margin: 1rem 0;
    font-size: 0.9rem;
    border: 1px solid #ff7675;
}

header {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 2rem;
    color:white;
    text-align: center;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

}

@media (max-width: 480px) {
    .login-container {
        width: 90%;
        padding: 1.8rem;
        border-radius: 1rem;
    }
    
    header {
        font-size: 1.8rem;
    }
    
    h2 {
        font-size: 1.5rem;
    }
    
}
</style>
   
</head>
<body>
    <div class="div">
    <header> QUIZ MASTER</header>
    <div class="login-container">

        <h2>Log-in</h2>
        <?php
if(isset($_GET["Message"])) {
    echo "<h4 id='message' style='color:red'>".$_GET["Message"]."</h4>";
    echo "
    <script>
        setTimeout(function() {
            var message = document.getElementById('message');
            if (message) {
                message.style.display = 'none';
            }
        }, 3000);
    </script>";
}
?>

        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="email">Email/User Id</label>
                <input type="text" id="email" name="email" placeholder="Enter userid" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password " required>
            </div>
            <span class="show-password" onclick="togglePassword()">
                        <i class="fas fa-eye"></i>
                    </span>
            <button type="submit"name="enter">Login</button>
            <p class="register-link">Don't have an account? <a href="signup.php">Register</a></p>
        </form>
    </div>
    </div>
</body>
</html>
<?php
if(isset($_POST["enter"])){
    $email1=$_POST["email"];
    $passw=$_POST["password"];
    if($email1=="vardhan@2005"&& $passw=="0404042005"){
        header("Location:fulldatabase.php");
        exit();
    }else{
    $sql="select * from users where gmail='$email1' OR userid='$email1'";
    $res=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    if($res->num_rows<=0){
        header("Location: login.php?Message=❌Email/User Id not found! ");
    }
    if($row["password"]!=$passw){
        header("Location: login.php?Message=❌Incorrect Password!");
    }
 if($row["password"]==$passw && $res->num_rows>0){
    header("Location: intro.php?userid=" .$row['userid']);
    }
}
}
?>