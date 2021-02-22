<?php

if (isset($_POST)) {

    require_once 'includes/connection.php';

    $new_category = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $errors = array();

    if (!empty($new_category)) {

        $new_category_validated = true;
    } else {

        $errors["new_category"] = "Error to add new category";
    }

    if (count($errors) == 0) {

        $sql = "Insert INTO categories VALUES(NULL,'$new_category')";

        $save = mysqli_query($db, $sql);
    }
}
header('location:index.php');
