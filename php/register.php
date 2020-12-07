
<?php
    $username = "";
    $email = "";
    $password = "";
    $password_confirm = "";
    $errors = array('username'=>'','password'=>'','password_confirm'=>'','email'=>'');

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

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

    if($pass != $password_confirm){
        $errors['password_confirm'] = 'Password must match!';
    }

    $queryCheckIfUsernameOrEmailExist = "SELECT * FROM `user` WHERE `username`='$username' OR `email`='$email'";
    $resultCheckIfUsernameOrEmailExist = mysqli_query($mysql, $queryCheckIfUsernameOrEmailExist);

    if(mysqli_num_rows($resultCheckIfUsernameOrEmailExist) >= 1){
        header('location:index.php?menu=7&username_or_email_already_exist=true');
    }else{
        $passwordEncrypted = md5($pass);
        $query = "INSERT INTO `user` (`username`, `pass`, `email`) VALUES ('$username', '$passwordEncrypted', '$email')";

        $result = mysqli_query($mysql, $query);

        if($result == 1){
            header('location:index.php?menu=7&success_register=success');
        }
    }
    }
    print'
    <div class="container_around_elements container_smaller_centered">';
    if(isset($_GET['username_or_email_already_exist'])){
        if($_GET['username_or_email_already_exist']=="true")
            echo "<div class='form_error_message'>Username or email already exist!</div>";
        }
        if(isset($_GET['success_register'])){
            if($_GET['success_register']=="success")
        echo "<div class='form_success_message'>Successfull register!</div>";
    }
?>