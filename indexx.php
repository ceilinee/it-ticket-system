<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>  </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <nav>   
        <div class="main-wrapper">
           <ul>
                <li><a href="index.php">Home</a></li>
           </ul>
           <div class="nav-login">    
                <form action="includes/login-inc.php" method="POST">
                    <input type="text" name="email" placeholder="e-mail">
                    <input type="password" name="pwd" placeholder="password">
                    <input type = 'submit' name ='submit' value = 'LOGIN' > 
                </form>
                <a href="signup.php">sign up </a>
           </div>
        </div>
    </nav>
</header>