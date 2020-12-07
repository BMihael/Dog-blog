<?php
    $username = '';
    $email = '';
    $password = '';
    $errors = array('username'=>'','password'=>'','email'=>'');

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(empty($username)){
            $errors['username'] = 'Username must not be empty!';
        }else if(!preg_match('/^[a-zA-Z0-9\s]+$/', $username)){
            $errors['username'] = 'Username must be letters and numbers only!';
        }

        if(empty($email)){
            $errors['email'] = 'Email must not be empty!';
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email must be valid!';
        }

        if(empty($pass)){
            $errors['password'] = 'Password must be entered!';
        }
        
        $passwordEncrypted = md5($pass);
        $query = "SELECT * FROM `user` WHERE `username` = '$username' AND `pass` = '$passwordEncrypted' AND `email` = '$email'";
        $result = mysqli_query($mysql, $query);

        if(mysqli_num_rows($result) == 0){
            //header('location:index.php?menu=6&success_login=false');
            //$_GET['success_login']='false';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['success_login'] = "Successful log in";
            $_SESSION['is_user_logged_in'] = TRUE;
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $_SESSION['user_logged_in'] = $id;
            header('location:index.php');
        }
    }

    print'
        <div class="container_around_elements container_smaller_centered">';
        if(isset($_GET['success_login'])){
            if($_GET['success_login']=="false"){
            print'
                <div class="message_warning">
                <p>Unrecognized username and password.</p>
                </div>';
            }
        }
?>