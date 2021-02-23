
<?php require_once 'includes/connection.php' ?>
<?php

if (isset($_SESSION['user']) && isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];
    $sql = "DELETE FROM posts  WHERE user_id=$user_id AND id=$post_id;";


    mysqli_query($db, $sql);
}
header('location:index.php');

