<?php require_once 'includes/helpers.php' ?>   
<?php require_once 'includes/header.php' ?>

<?php
$actual_category = get_category($db, $_GET['idcategory']);
$category_id = $_GET['idcategory'];


if (!isset($actual_category['id'])) {

    header('location:index.php');
}
?>


<div id="container">
    <?php require_once'includes/aside.php' ?>


    <div id="main">

        <h1>Posts of <?= $actual_category['name'] ?></h1>
        <?php
        $posts = get_all_posts($db, null, $category_id);

        if (!empty($posts)&& mysqli_num_rows($posts)>=1):
            while ($post = mysqli_fetch_assoc($posts)):
                ?>
                <article class="entry_posts">
                    <a href="post-details.php?id=<?=$post['id']?>">
                        <h2><?= $post['title'] ?> </h2>
                        <span class="date_last_posts"><?= $post['category'] . ' | ' . $post['date'] ?> </span>   

                        <p><?= substr($post['description'], 0, 180) . "..." ?> </p>
                    </a>
                </article>
                <?php
            endwhile;
       else:
        ?>
        <div class="error-alert">No posts at now</div>
        
        <?php endif ?>
        <div id="see-all">
            <a href="entries.php">
                See all posts
            </a>

        </div>
    </div>

    <div class="clearfix"></div>
</div>
<?php require_once 'includes/footer.php' ?>

</body>

</html>