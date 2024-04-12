<?php 
    require_once 'includes/header.php';
    include 'connect.php';
    session_start();
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
    .flex-container {
        display: flex;
        flex-direction: column;
    }

    .flex-container > div {
        background-color: whitesmoke;
        width: 1500px;
        margin: 10px;
        text-align: center;
        line-height: 30px;
        border-radius: 30px;
    }

    .flex-container-row {
        display: flex;
        flex-direction: row;
    }

    .flex-container-row > div {
        background-color: whitesmoke;
        width: 1500px;
        margin: 10px;
        padding: 20px;
        text-align: center;
        line-height: 30px;
        border-radius: 30px;
    }
    #register_body {
        background-image:url("Resources/bgLogIn.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body id="register_body">
<div class="flex-container" style="align-items: center">
        <div style="font-family: 'Century Gothic'">
            <a href="index.php" style="padding: 20px; color: gray">Home</a>
            <a href="login.php" style="padding: 20px; color: gray">Log Out</a>
            <hr style="width: 50%; margin: auto; border-color: black">
            <img src="resources/Heading.png" alt="Bootstrap" width="200" height="200">
            <hr style="width: 50%; margin: auto; border-color: black">
            <hr style="width: 50%; margin: auto; padding:10px; border-color: black">
        </div>
        <div class="flex-container-row">
            <div style="background-color: #b67352; border-radius: 30px">
                <hr style="width: 75%; border-color: white">
                <h4 style="color: white"><b>CREATE POST</b></h4>
                <hr style="width: 75%; border-color: white">
                <form method="post" style="text-align: justify">
                    <label for="entryContent" style="color: #b67352">What is your thoughts?</label>
                    <textarea name="entryContent" id=entryContent rows="4" cols="40" style="line-height: 20px; border-radius: 30px; padding: 10px"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary" name="btnPost" value="Post" style="margin: auto; width: 360px; border-color: #b67352; background-color: white; color: #b67352; border-radius: 30px"><b>POST ENTRY</b></button>
                </form>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entryContent'])){
                        if(isset($_POST['btnPost'])){		
                            //retrieve data from form and save the value to a variable
                            $entryContent = $_POST['entryContent'];
                            $currAcc = $_SESSION['acctid'];

                            $sql4 ="Insert into tblentry(entrycontent,acctid,heartcount) values('".$entryContent."','".$currAcc."','0')";
                                mysqli_query($connection,$sql4);
                                echo "<script language='javascript'>
                                            alert('New entry saved.');
                                      </script>";
                        }
                    }
                ?>
            </div>
            <div style="background-color: #b67352; border-radius: 30px">
                <hr style="width: 75%; border-color: white">
                <h4 style="color: white"><b>ENTRIES</b></h4>
                <hr style="width: 75%; border-color: white">
                <?php
                    $mysqli = new mysqli('localhost', 'root','','dbobandof1');
                    $entries = $mysqli->query("SELECT * from tblentry entry INNER JOIN tbluseraccount as ua ON entry.acctid = ua.acctid") or die($mysqli->error);
                    foreach($entries as $entry){
                        echo '<div style="display: inline-block; line-height: 10px; width: 300px; height: 300px; border: 1px solid black; margin-top: 1.5%; padding: 10px; border-radius: 10px; background-color: white">
                                <h3 style="color: #b67352"><b>'.$entry['username'].'</b></h3>
                                  <p style="font-size: 15px">'.$entry['entrycontent'].'</p>
                                <hr style="width: 75%; border-color: black">
                                <p><b>'.$entry['dateadded']. '</b></p>
                                <hr style="width: 75%; border-color: black">';
                        echo '<br>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>


