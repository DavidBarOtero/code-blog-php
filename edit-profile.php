<?php

if (isset($_POST)) {
    require_once 'includes/connection.php';


    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $last_name = isset($_POST['last_name']) ? mysqli_real_escape_string($db, $_POST['last_name']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;


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



    if (count($errors) == 0) {

        $sql = "SELECT id,email from users where email='$email'";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);
        if ($isset_user['id'] == $_SESSION['user']['id'] || empty($isset_user)) {


            $save_user = true;
            $user = $_SESSION['user'];

            $sql = "UPDATE users SET name='$name',last_name='$last_name',email='$email' where id= " . $_SESSION['user']['id'];
            ;

            $update_user = mysqli_query($db, $sql);
            if ($update_user) {
                $_SESSION['completed'] = "User profile updated";
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['last_name'] = $last_name;
                $_SESSION['user']['email'] = $email;


                header('location:index.php');
            } else {

                $_SESSION['errors']['general'] = "A error ocurred at updated user profile";
            }
        } else {
            $_SESSION['errors']['general'] = "Another user with the same account";
            header('location:profile.php');
        }

        // var_dump(mysqli_error($db));
    } else {
        session_start();
        $_SESSION['errors'] = $errors;
        header('location:profile.php');
    }
}







