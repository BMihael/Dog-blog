<?php
    require_once 'php/register.php';

    print'
    <form method="post" action="index.php?menu=7">
    <label>Username</label>
    <input type="text" name="username" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <label>Confirm password<label>
    <input type="password" name="password_confirm" required>
    <label>Email</label>
    <input type="text" name="email" required>
    <button class="button_submit" type="submit" name="register">Register</button>
    </form>
    <p>Already registered?  <a href="index.php?menu=6">Sign in!</a></p>
    </div>';
?>