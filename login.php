<?php 
    require_once 'includes/header1.php';
    include 'connect.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - WanderLog</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='css/style.css'>
    <style>
    #login_body {
        background-image: url("Resources/bgLogIn.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body id="login_body">
    <a href="index.html" class="back-button">Back</a>
    <form id="login_form" method="POST">
        <label for="username">Username</label>
        <br>
        <input type="text" id="txtusername" name="txtusername" placeholder="Enter your username" required>
        <br>
        <label for="password">Password</label>
        <br>    
        <input type="password" id="txtpassword" name="txtpassword" placeholder="Enter your password" required>
        <br>
        <input type="submit" name="btnLogin"value="Log In">
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </form>
</body>
</html>

<?php	
	if(isset($_POST['btnLogin'])){
		$uname=$_POST['txtusername'];
		$pwd=$_POST['txtpassword'];
		//check tbluseraccount if username is existing
		$sql ="Select * from tbluseraccount where username='".$uname."'";
		
		$result = mysqli_query($connection,$sql);

		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		
		if($count== 0){
			echo "<script language='javascript'>
						alert('username not existing.');
				  </script>";
		}else if(password_verify($pwd, $row[3])) {
			$_SESSION['username']=$row[2];
            $_SESSION['acctid']=$row[0];
			header("location: landingpage.php");
		}else{
            echo "<script language='javascript'>
						alert('Incorrect password');
				  </script>";
		}
	}
?>

<?php 
    require_once 'includes/footer.php';
?>
