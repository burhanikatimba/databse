<?php

    session_start();
    require 'connect.php';

    if(isset($_REQUEST['up'])){

        $un=$_REQUEST['username'];
        $pas=$_REQUEST['pass'];

        $select="SELECT * FROM users WHERE username='$un' AND password='$pas'";
        $result=mysqli_query($conn,$select);

        if(mysqli_num_rows($result)==1){
            $user=mysqli_fetch_assoc($result);
            $_SESSION['id']=$user['id'];
            header("location:contacts.php?id=".$_SESSION['id']);
        }
        else{
            $error='incorrect username or password';
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
        <h3>Sign In</h3>
        <?php if(isset($error)){
            echo '<span class="error">'.$error.'</span>';
        } ?><br>
        <form action="signin.php" method="post">
            <input type="text" name="username" id="" placeholder="Enter User Name" required><br><br>
            <input type="password" name="pass" id="" placeholder="Enter Password" required><br><br>
            <input type="submit" value="Sign In" name="up" class="submit"><br><br>
            <label for="link">If You Don't have Account? <a href="signup.php">Sign Up</a></label>
        </form>
    </div>
</body>
</html>