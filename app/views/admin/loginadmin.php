<?php
$message = isset($message) ? $message : ""; // Initialize the variable
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin HOS</title>
    <link rel="stylesheet" href="app\assets\css\loginadmin.css">
</head>
<body>
    
    <div class="container">
        <div class="adminform">
            <form action="?action=proccessloginadm" method="post">
                <h2>ADMIN LOGIN</h2>
                <input type="text" name="Username" placeholder="Admin Username">
                <input type="password" name="Password" placeholder="Password">
                <button type="submit">LOGIN</button>
                <br></br>
                <p><?php
                if (!empty($message)) {
                    echo '<script>alert("' . $message . '");</script>';
                }
                ?></p>
            </form>
        </div>
        <!-- Display the message here -->
        
        <div class="image">
            <img src="app\assets\image\adminlogin.png" width="300px">
        </div>
    </div>

</body>
</html>