<?php
include 'header.php';
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>Signup</h2>
        <form class="signup-form" action="includes/signup-inc.php" method="POST">
            <input type="text" name="first" placeholder="Firstname">
            <input type="text" name="last" placeholder="Lastname">
            <input type="text" name="cubicle" placeholder="cubicle">
            <input type="text" name="dept" placeholder="department">
            <input type="text" name="position" placeholder="position">
            <input type="text" name="email" placeholder="E-mail">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>
</section>


