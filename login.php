<?php
    require_once 'php/login.php';

    print'
    <form method="post" action="index.php?menu=6">
    <label>Username</label>
    <input type="text" name="username" required>
    <label>Email</label>
    <input type="text" name="email" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <button class="button_submit" type="submit" name="login">Login</button>
    </form>
    <p>Not registered? <a href="index.php?menu=7">Sign up!</a></p>
    </div>';
?>