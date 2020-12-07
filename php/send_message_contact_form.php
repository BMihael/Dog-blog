<?php
    if(isset($_POST['sendMessage'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $message = $_POST['message'];

        $id = NULL;
        if(isset($_SESSION['user_logged_in'])){
            $id = $_SESSION['user_logged_in'];
        }

        $query = "INSERT INTO `contactmessage` (`firstName`, `lastName`, `email`, `country`, `message`, `user`) VALUES ('$firstName', '$lastName', '$email', '$country', '$message', '$id')";

        $result = mysqli_query($mysql, $query);
        if($result == True){
            header('location:index.php?menu=3&message=success');
        }
    }
    if(isset($_GET['message'])){
        if($_GET['message']=="success"){
            print'
            <p>Successful sent message.</p>';
        }else{
            print'
            <p>No message sent.</p>';
        }
    }
?>
