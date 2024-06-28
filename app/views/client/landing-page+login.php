<?php
$message = isset($message) ? $message : ""; // Initialize the variable
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta  http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Of Shoe</title>
    <link rel="stylesheet" href="app\assets\css\style.css">
</head>

<body>
    
    <header>
      <h2 class = "logo"> Home Of Shoes </h2>
      <nav class = "navigation">
        <a href="?action=loginadmin">Admin</a>
        <button class = "btnLogin-popup" >Login</button>
      </nav>
    </header>
    
    <div class="h-text">
            <span>HOME OF SHOE</span>
            <h1>Walk the Clean Path, 
                Where Every Step Matters!</h1>
            <br>
            <a href="#">Visit Now</a>
    </div>

    <div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="?action=proccesslogin" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="Email" name="Email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="Password" name="Password" required>
                    <label>Password</label>
                </div>
                <p><?php
                if (!empty($message)) {
                    echo '<script>alert("' . $message . '");</script>';
                }
                ?></p>
                <button type="Submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" 
                    class="Register-Link">Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-box Register">
            <h2>Register</h2>
            <form action="?action=saveregister" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="Full_name"required>
                    <label>Full Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                    <input type="text" name="Username"required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="Email" name="Email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="Password" name="Password" required>
                    <label>Password</label>
                </div>
                <p><?php
                if (!empty($message)) {
                    echo '<script>alert("' . $message . '");</script>';
                }?>
                <button type="Submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" 
                    class="Login-Link">Login</a></p>
                </div>
            </form>
        </div>
    
    <script src="app\assets\js\script.js" ></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>


</html>