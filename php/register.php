<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Styles-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='stylesheet' href='style.css'>
    <!--Styles-->
    <title>Register</title>
</head>
<body id="register_body">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="Resources/Heading.png" alt="Bootstrap" width="50" height="50">
                <b style="font-family: 'Lucida Sans'; color: #B67352">WanderLOG</b>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav" style="align-items: flex-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="contact.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <a href="index.html" class="back-button">Back</a>
    <form id="register_form" method = "GET" action = "login.html">
        <label for = "registration">Register</label>
        <br>
        <input type = "text" name = "new_name" placeholder="Enter name" required></input>
        <br>
        <input type = "text" name = "new_username" placeholder="Enter username" required></input>
        <br>
        <input type = "text" name = "new_email" placeholder="Enter email" required></input>
        <br>
        <input type="password" name = "new_password" placeholder = "Enter password" required></input>
        <input type="password" name = "confirm_password" placeholder = "Confirm password" required></input>
        <br>
        <input type = "submit" value = "Register"></input>
    </form>
    
    <footer>
        Nicole Ejares
        <br>
        BSCS - 2
    </footer>
</body>
</html>