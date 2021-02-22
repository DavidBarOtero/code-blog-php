<?php

if (isset($_POST)) {
    require_once 'includes/connection.php';

    if (!isset($_SESSION)) {

        session_start();
    }
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $last_name = isset($_POST['last_name']) ? mysqli_real_escape_string($db, $_POST['last_name']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;


    $errors = array();
    $save_user = false;

    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {

        $validated_name = true;
    } else {
        $validated_name = false;
        $errors['name'] = "The name is not correct, repeat again";
    }

    if (!empty($last_name) && !is_numeric($last_name) && !preg_match("/[0-9]/", $last_name)) {

        $validated_last_name = true;
    } else {
        
        
        $validated_last_name = false;
        $errors['last_name'] = "The last name is not correct, repeat again";
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $validated_email = true;
    } else {
        $validated_email = false;
        $errors['email'] = "The email is not correct, repeat again";
    }

    if (!empty($password)) {

        $validated_password = true;
    } else {
        $validated_password = false;
        $errors['password'] = "Password can´t be empty ";
    }


    if (count($errors) == 0) {

        $save_user = true;
        $secure_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        $sql = "INSERT INTO users VALUES(null,'$name','$last_name','$email','$secure_password',CURDATE());";
        $insert_user = mysqli_query($db, $sql);
       // var_dump(mysqli_error($db));
       
        if ($insert_user) {
            $_SESSION['completed'] = "user saved";
        } else {

            $_SESSION['errors']['general'] = "A error ocurred at save user";
        }
    } else {
        session_start();
        $_SESSION['errors'] = $errors;

        header('Location:index.php');
    }
    header('Location:index.php');
}


header('Location:index.php');



