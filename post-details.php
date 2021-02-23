<?php require_once 'includes/helpers.php' ?>   
<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/connection.php' ?>
<?php
$actual_post = detail_post($db, $_GET['id']);


if (!isset($actual_post['id'])) {

    header('location:index.php');
}
?>


<div id="container">
    <?php require_once'includes/aside.php' ?>


    <div id="main">

        <h1><?= $actual_post['title'] ?></h1>
        <a href="category.php?idcategory=<?= $actual_post['id'] ?>">

            <h2><?= $actual_post['title'] ?></h2>
        </a>

        <h4><?= $actual_post['date'] ?>|<?=$actual_post['user']?></h4>
        <p><?= $actual_post['description'] ?></p>
        <?php
        if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $actual_post['user_id']):
            ?> <br/>
            <div style="display:flex;flex-direction: row;justify-content:flex-start;">
               
                <a href="edit-post.php?id=<?=$actual_post['id']   ?>" class="green-button"  > Edit post</a>  
                <a href="delete-post.php?id=<?=$actual_post['id']  ?>" class="red-button" > Delete post</a> 
            </div>

        <?php endif; ?>

    </div>
    <?php require_once 'includes/footer.php' ?>


