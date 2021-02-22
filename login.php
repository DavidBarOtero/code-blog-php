<?php

if (isset($_POST)) {
    require_once 'includes/connection.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    $sql = "SELECT * FROM users where email='$email'";
    $login = mysqli_query($db, $sql);
   
   
    if ($login) {

        $user = mysqli_fetch_assoc($login);
  
        $verify = password_verify($password, $user['password']);
        
        
 
          
            if ($verify) {

            $_SESSION['user'] = $user;
            $_SESSION['user-id']=$user['id'];
        } else {

            $_SESSION['login-error'] = "Login error!!";
        }
    } else {

        $_SESSION['user'] = $user;
    }
}

header('location:index.php');

