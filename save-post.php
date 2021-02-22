<?php

if (isset($_POST)) {

    require_once 'includes/connection.php';

    $title= isset($_POST['title']) ? mysqli_real_escape_string($db, $_POST['title']) : false;
    $description= isset($_POST['description']) ? mysqli_real_escape_string($db, $_POST['description']) : false;
       $category= isset($_POST['category']) ? (int)mysqli_real_escape_string($db, $_POST['category']) : false;
    $user_id=isset($_SESSION['user-id']) ? $_SESSION['user-id'] : null ;
    $errors = array();
    if (empty($user_id)||$user_id==null) {

          $errors["login"] = "You are not logged";
          
          header('location:index.php');
    } 
    if (empty($title)) {

          $errors["title"] = "Title can not be empty";
    } 
    if (empty($description)) {

          $errors["description"] = "Description can not be empty";
    } 
    if(empty($category)||!is_numeric($category)) {
        
            $errors["new-post"] = "An error ocurred with category selection";

      
    }


    if (count($errors) == 0) {

        $sql = "Insert INTO posts VALUES(NULL,'$title','$description','$user_id','$category',CURDATE())";

        $save = mysqli_query($db, $sql);
        
  
header('location:index.php');
      
    }
    else{
        
     $_SESSION['errors']=$errors;
        header('location:create-post.php');
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

