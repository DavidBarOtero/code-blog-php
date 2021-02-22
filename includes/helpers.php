<?php

function show_error($errors, $field) {
    $alert = "";
    if (isset($errors[$field]) && !empty($field)) {

        $alert = "<div class='error-alert'> $errors[$field]</div>";
    }
    return $alert;
}

function erase_errors() {
    $_SESSION['errors'] = null;
    $erased = session_unset();


    return $erased;
}

function get_categories($connection) {

    $sql = "SELECT * FROM categories ORDER BY id ASC";

    $categories = mysqli_query($connection, $sql);
    $result = array();

    if ($categories) {
        $result = $categories;
    }


    return $result;
}
function get_category($connection,$id) {

    $sql = "SELECT * FROM categories where id=$id ORDER BY id ASC";

    $categories = mysqli_query($connection, $sql);
    $result = array();

    if ($categories) {
        $result = mysqli_fetch_assoc($categories);
    }


    return $result;
}
function get_all_posts($connection, $limit = null,$category=null) {

    $sql = "SELECT * from posts INNER JOIN categories ON posts.category_id=categories.id  ";
    
    if($category!=null){
        
        $sql .="WHERE posts.category_id='$category'";
   
    }
    $sql .="ORDER BY posts.id DESC";
    if ($limit) {

        $sql .= " LIMIT 4";
    }
  
    
   
    
    $posts = mysqli_query($connection, $sql);

    $result = array();
    if ($posts) {

        $result = $posts;
    }
    return $result;
}
