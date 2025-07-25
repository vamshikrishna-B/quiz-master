<?php
include("logindb.php");
?>
<?php
if(isset($_POST["login"])){
    $username=trim($_POST["username"]);
    $userid=trim($_POST["userid"]);
    $userpassword=trim($_POST["password"]);
    $userpassword1=trim($_POST["confirm_password"]);
    $useremail=trim($_POST["email"]);
    $sql="select * from users where userid='$userid'";
    $res=mysqli_query($conn,$sql);
    if($res->num_rows>0){
        header("Location: signup.php?Message1= ❌UserId already exisist");
    }
    $sql="select * from users where gmail='$useremail'";
    $res=mysqli_query($conn,$sql);

    if($res->num_rows>0){
        header("Location: signup.php?Message1= ❌Email  already exisist");
    }
    if($userpassword1!=$userpassword){
        header("Location: signup.php?Message1= ❌Password is not Valid");
    }
    else if(strlen($userid)<10){
        header("Location: signup.php?Message1= ❌userid length should be more than 10 ");
    }
    else if(strlen($userpassword)<10){
        header("Location: signup.php?Message1= ❌Password length should be more than 10 ");
    }
    else if($res1->num_rows>0){
        header("Location: signup.php?Message1= ❌Phone Number  already exisist");
    }
    else{
    $query="INSERT INTO users(`name`,`password`,`gmail`,`userid`) VALUES('$username','$userpassword','$useremail','$userid')";
    mysqli_query($conn,$query);
    header("Location: login.php");
}
}
?>