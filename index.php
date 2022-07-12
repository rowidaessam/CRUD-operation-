<?php
    include_once("config.php");
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query($mysqli, $sql) or die( mysqli_error($mysqli)); // (@) and (or die) ==> error operator to handle the error and show the messege i'll written 
    $date = new DateTime();
    $time = $date->getTimezone();
?>

<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
</head>

<body>
    <div class="nav nav-pills mb-3">
<a class="btn btn-outline-dark" href="add.php">Add New User</a><br/><br/></div>

    <table class="table table-dark table-sm" width='80%' border=1>

    <tr>
        <th>Name</th> 
        <th>Email</th>
        <th>Confirm Password</th>
        <th>Room NO</th>
        <th>EXT</th>
       <!-- <th>Profile Picture</th> -->
        <th>Picture</th>
        <th>Update and Delete</th>
        <?php
            while($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$user_data['name']."</td>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$user_data['Confirmpassword']."</td>";
                echo "<td>".$user_data['Room']."</td>";
                echo "<td>".$user_data['ext']."</td>";
                // echo "<td>".$user_data['Profilepicture']."</td>";
                echo "<td><img src='PHP_Image/$user_data[picture]' width='80px' /></td>"; 
                // 

                echo "<td><a class='btn btn-outline-secondary' href='delete.php?id=$user_data[id]'>Delete</a> 
                          <a class='btn btn-outline-secondary' href='edit.php?id=$user_data[id]'>Edit</a>
                 </td>";
                 echo "</tr>";
              
            }
        ?>
    
       
    </tr>
   
    </table>
</body>
</html>