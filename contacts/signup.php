<?php
    require 'connect.php';

    if(isset($_REQUEST['up'])){

        $un=$_REQUEST['username'];
        $em=$_REQUEST['email'];
        $pn=$_REQUEST['phone'];
        $pas=$_REQUEST['pass'];

        $select="SELECT * FROM users WHERE username='$un' AND password='$pas'";
        $result=mysqli_query($conn,$select);

        if(mysqli_num_rows($result)==1){
            $error='user already exist';
        }
        else{
            
            $insert="INSERT INTO users(username,email,phonenumber,password) VALUES('$un','$em','$pn','$pas')";
            $result1=mysqli_query($conn,$insert);

            if($result1){
                header("location:signin.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="bur">
        <h3>Sign Up</h3>
        <?php if(isset($error)){
            echo '<span class="error">'.$error.'</span>';
        } ?><br>
        <form action="signup.php" method="post">
            <input type="text" name="username" id="" placeholder="Enter User Name" required><br><br>
            <input type="email" name="email" id="" placeholder="Enter Email" required><br><br>
            <input type="number" name="phone" id="" placeholder="Enter Phone Number" required><br><br>
            <input type="password" name="pass" id="" placeholder="Enter Password" required><br><br>
            <input type="submit" value="Sign Up" name="up" class="submit"><br><br>
            <label for="link">If You have Account? <a href="signin.php">Sign In</a></label>
        </form>
    </div>
</body>
</html>