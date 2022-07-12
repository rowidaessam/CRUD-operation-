<html>
<head>
	<link rel="stylesheet" href="../CSS/bootstrap.min.css">
	<title>Add Users</title>
	<style>
		.input-group-text, .form-control {
			margin: 10px;
		}
		.form-control{
			width: 200px;
			height: 40px;
		}
	</style>
</head>

<body>
	<ul class="nav nav-pills mb-3">
	<a class="btn btn-outline-secondary" href="add.php"> Home </a>
	<a class="btn btn-outline-secondary" href=""> Products </a>
	<a class="btn btn-outline-secondary" href="index.php"> Users </a>
	<a class="btn btn-outline-secondary" href=""> Manual Order </a>
	<a class="btn btn-outline-secondary" href=""> Checks </a>
	<br/><br/>
	</ul>

	<form action="add.php" method="post" name="form1" action="upload.php" enctype="multipart/form-data">
		<table width="25%" border="0">
		<tr  class="input-group flex-nowrap">
				<td class="input-group-text" >Name</td>
				<td><input type="text" class="form-control" name="name" ></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text" >Email</td>
				<td><input type="email" class="form-control" name="email" ></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text" >Password</td>
				<td><input type="password" class="form-control" name="password" ></td>
			</tr>
			<tr  class="input-group flex-nowrap ">
				<td class="input-group-text" >Confirm Password</td>
				<td><input type="password" class="form-control" name="Confirmpassword"></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text" >Room no</td>
				<td><input type="number" class="form-control" name="Room"></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text">Ext</td>
				<td><input class="form-control" type="number" name="ext" ></td>
			</tr>
			<tr  class="input-group flex-nowrap">
				<td class="input-group-text" >Profile picture</td>
				<td><input type="file" class="form-control" name="Profilepicture"></td>
			</tr>
			
			<tr>
				<td></td>
				<td  class="col-auto"><input type="submit" id="btn"  class="btn btn-outline-secondary" name="Submit" value="Save"></td>
				<td  class="col-auto"><input type="reset"  class="btn btn-outline-secondary" name="Reset" value="Reset"></td>
			</tr>
		</table>
	</form>
	
	<?php
	include_once("upload.php");
	if(isset($_POST['Submit'])) {
		$name = $_POST['name']; 
		$email = $_POST['email']; 
		$Confirmpassword = $_POST['Confirmpassword']; 
		$Room = $_POST['Room']; 
		$ext = $_POST['ext']; 
		include_once("config.php");
		$result = mysqli_query($mysqli,"INSERT INTO users(name, email, Confirmpassword, Room, ext, picture) VALUES('$name','$email','$Confirmpassword','$Room','$ext','$pic')");
		echo "User added successfully."."<br>";

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$regex ="/^[a-z\s]{3,}$/i";
		if(preg_match($regex, $name)){
			$name = $_POST['name']; 
		} else{
			$errMsr = "Enter a valid name"."<br>";
			echo $errMsr;
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $errEmail="Enter a valid email"."<br>";
		   echo $errEmail;
		} else{
			$email = $_POST['email']; 
		}
		if(empty($_POST["Confirmpassword"])){
			$errPass="Enter a valid password"."<br>";
			echo $errPass;

		 } else{
			$Confirmpassword = $_POST['Confirmpassword']; 	 
		 }	
		if(empty($_POST["Room"])){
			$errRoom="Enter a valid Room"."<br>";
			echo $errRoom;
		 } else{
			$Room = $_POST['Room']; 
		 }
		 if(empty($_POST["ext"])){
			$errTxt="Enter a valid ext"."<br>";
			echo $errTxt;

		 } else{
			$ext = $_POST['ext']; 	 
		 }	
	}
	}
	?>
</body>
</html>