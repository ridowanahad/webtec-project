<?php 
session_start();

	include("connection.php");
	include("functions.php");

$user_nameErr = $emailErr = $passwordErr= $errorErr ="";
      $user_name = $email = $password = $error ="";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
        $email =$_POST['email'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))

{
			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
		die;
		}
if(isset($_POST["btn_signup"]))
	{
		$user_name = $_POST['user_name'];


		if( str_word_count($user_name)<=2 )
		{
			$error ="Wrong inputt";
        echo $error; 
			
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$user_name)){
			$error ="Wrong inputtt";
        echo $error;
		}
		if (empty($_POST["user_name"])) {
          $user_nameErr = "user_name is required";
}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: green;
		background-color: black;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: yellow;">Signup</div>
<h2>user_name:</h2>
			<input id="text" type="text" name="user_name"><br><br>
<h2>password:</h2>
			<input id="text" type="password" name="password"><br><br>
<h2>email:</h2>			  
            <input id="text" type="text" name="email" value="<?php echo $email;?>">
        <span class="error"><?php echo $emailErr;?></span><br><br>

			<input id="button" type="submit" name="bt_signup" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>


