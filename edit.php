<?php
include_once("config.php");
if(isset($_POST['update']))
{
	$id = $_GET['id'];  
	$name=$_POST['name'];
	$email=$_POST['email'];
	$Password = $_POST['Password']; 
	$Confirmpassword = $_POST['Confirmpassword']; 
	$Room = $_POST['Room']; 
	$ext = $_POST['ext']; 
	$Profilepicture = $_POST['Profilepicture']; 
	$result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',Password='$Password', Confirmpassword='$Confirmpassword',Room='$Room',ext='$ext',Profilepicture='$Profilepicture' WHERE id=$id");
	header("Location: index.php");
}
	$id = $_GET['id']; 
	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
	$user_data = mysqli_fetch_array($result);
	$name = $user_data['name'];
	$email = $user_data['email'];
	$Confirmpassword = $user_data['Confirmpassword'];
	$Room = $user_data['Room'];
	$ext = $user_data['ext'];
	$Profilepicture = $user_data['Profilepicture'];


?>
<html>
<head>
<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	<title>Edit User Data</title>
</head>

<body>
<ul class="nav nav-pills mb-3">
	<a  class="btn btn-outline-secondary" href="index.php">Home</a>
	<br/><br/>
</ul>

	<form name="update_user" method="post" action="edit.php?id=<?php echo $id ?>">
		<table border="0">
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text">Name</td>
				<td>
					<input class="form-control"  type="text" name="name" value="<?php echo $name ?>" >
				</td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text">Email</td>
				<td><input class="form-control"  type="text" name="email" value="<?php echo $email ?>"></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text">Password</td>
				<td><input class="form-control"  type="Password" name="Password" value="<?php echo $Password ?>"></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text">Confirm Password</td>
				<td><input class="form-control"  type="password" name="Confirmpassword" value="<?php echo $Confirmpassword ?>"></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text"> Room</td>
				<td><input class="form-control"  type="number" name="Room" value="<?php echo $Room ?>"></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text">Ext</td>
				<td><input class="form-control"  type="text" name="ext" value="<?php echo $ext ?>"></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text">Profile Picture</td>
				<td><input class="form-control"  type="text" name="Profilepicture" value="<?php echo $Profilepicture ?>"></td>
			</tr>
			<tr>
				<td><input class="btn btn-outline-secondary" type="submit" name="update" value="Update"></td>
				
			</tr>
		</table>
	</form>
</body>
</html>