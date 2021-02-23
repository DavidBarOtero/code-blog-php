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

function get_category($connection, $id) {

    $sql = "SELECT * FROM categories where id=$id ORDER BY id ASC";

    $categories = mysqli_query($connection, $sql);
    $result = array();

    if ($categories) {
        $result = mysqli_fetch_assoc($categories);
    }


    return $result;
}

function get_all_posts($connection, $limit = null, $category = null,$find=null) {

    //$sql = "SELECT * from posts  INNER JOIN categories ON posts.category_id=categories.id  ";
    $sql = "SELECT e.*,c.name AS 'category' FROM posts e" .
            " INNER JOIN categories c on e.category_id=c.id";

    if ($category != null) {

        $sql .= " WHERE e.category_id='$category'";
    }
      if ($find != null) {

        $sql .= " WHERE e.title like'%$find%'";
    }
    $sql .= " ORDER BY e.id DESC";
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

function detail_post($connection, $id) {
    $sql="SELECT e.*,c.name AS 'category',CONCAT(u.name,' ',u.last_name)AS 'user' FROM posts e ".
            "INNER JOIN categories c ON e.category_id=c.id ".
            "INNER JOIN users u ON e.user_id=u.id ".
            "WHERE e.id=$id";
    
    $post = mysqli_query($connection, $sql);


    $result = array();
    if ($post && mysqli_num_rows($post) >= 1) {
        $result = mysqli_fetch_assoc($post);
    }


    return $result;
}

