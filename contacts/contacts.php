<?php 

    require 'connect.php';

    $id=$_REQUEST['id'];
    $select="SELECT * FROM contacts WHERE user_id='$id'";
    $result=mysqli_query($conn,$select);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contacts</title>
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <button><a href="add.php?id=<?=$id?>">Add Contact</a></button><br><br>
    <table>
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $h=1; foreach($result as $user){ ?>
            <tr>
                <td><?=$h++?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['phonenumber']?></td>
                <td>

                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>