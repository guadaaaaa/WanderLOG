<?php 
    require_once 'includes/header1.php';
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Styles-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='css/style.css'>
    <!--Styles-->
    <title>Register</title>
    <style>
    #register_body {
        background-image:url("Resources/bgLogIn.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body id="register_body">
    <a href="index.html" class="back-button">Back</a>
    <form id="register_form" method = "POST">
        <label for = "registration">Register</label>
        <br>
        <input type = "text" name = "txtfirstname" placeholder="Enter first name" required></input>
        <br>
        <input type = "text" name = "txtlastname" placeholder="Enter last name" required></input>
        <br>
        <input type = "text" name = "txtuname" placeholder="Enter username" required></input>
        <br>
        <input type = "text" name = "txtemail" placeholder="Enter email" required></input>
        <br>
        <input type = "text" name = "txtgender" placeholder="Enter gender" required></input>
        <br>
        <label for="txtbdate">Birthdate: </label>
        <input type="date" name = "txtbdate" required>
        <br>
        <br>
        <input type="password" name = "txtpassword" placeholder = "Enter password" required></input>
        <br>
        <input type = "submit" name="btnRegister" value = "Register"></input>
    </form>
</body>
</html>

<?php	
	if(isset($_POST['btnRegister'])){		
		//retrieve data from form and save the value to a variable
		//for tbluserprofile
		$fname=$_POST['txtfirstname'];		
		$lname=$_POST['txtlastname'];
        $gender=$_POST['txtgender'];
        $bdate=$_POST['txtbdate'];
		
		
		//for tbluseraccount
		$email=$_POST['txtemail'];		
		$uname=$_POST['txtuname'];
		$pword=password_hash($_POST['txtpassword'],PASSWORD_DEFAULT);
		
		//Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
		$sql2 ="Select * from tbluseraccount where username='".$uname."'";
		$result = mysqli_query($connection,$sql2);
		$row = mysqli_num_rows($result);
		if($row == 0){
            $sql1 ="Insert into tbluserprofile(firstname,lastname,gender,birthdate) values('".$fname."','".$lname."','".$gender."','".$bdate."')";
		    mysqli_query($connection,$sql1);
			$sql ="Insert into tbluseraccount(emailadd,username,password,usertype) values('".$email."','".$uname."','".$pword."','1')";
			mysqli_query($connection,$sql);
			echo "<script language='javascript'>
						alert('New record saved.');
				  </script>";
            $sql22 ="SELECT * FROM tbluseraccount WHERE username='$uname'";
            $result2 = mysqli_query($connection,$sql22);
            if ($row2 = mysqli_fetch_assoc($result2)) {
                // Set session variables
                $_SESSION['username'] = $row2['username'];
                $_SESSION['acctid'] = $row2['acctid'];
                header("location: landingpage.php");
            }
		}else{
			echo "<script language='javascript'>
						alert('Username already existing');
				  </script>";
		}
	}
		

?>

<?php 
    require_once 'includes/footer.php';
?>