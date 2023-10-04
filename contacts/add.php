<?php
    require 'connect.php';

    $id=$_REQUEST['id'];

    if(isset($_REQUEST['up'])){

        $id=$_REQUEST['id'];
        $un=$_REQUEST['username'];
        $pn=$_REQUEST['phone'];

        $select="SELECT * FROM contacts WHERE phonenumber='$pn' AND user_id='$id'";
        $result=mysqli_query($conn,$select);

        if(mysqli_num_rows($result)==1){
            $error='number already exist';
        }
        else{
            
            $insert="INSERT INTO contacts(name,phonenumber,user_id) VALUES('$un','$pn','$id')";
            $result1=mysqli_query($conn,$insert);

            if($result1){
                header("location:contacts.php?id=$id");
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
        <form action="add.php?id=<?=$id?>" method="post">
            <input type="text" name="username" id="" placeholder="Enter Name" required><br><br>
            <input type="number" name="phone" id="" placeholder="Enter Phone Number" required><br><br>
            <input type="submit" value="Add Contact" name="up" class="submit">
        </form>
    </div>
</body>
</html>