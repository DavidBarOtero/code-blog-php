<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/helpers.php' ?>


<div id="container">
    <?php require_once'includes/aside.php' ?>


    <div id="main">

        <h1>All posts</h1>
        <?php
        $posts = get_all_posts($db,null,null);

        if (!empty($posts)):
            while ($post = mysqli_fetch_assoc($posts)):
                ?>
                <article class="entry_posts">
                    <a href="">
                        <h2><?= $post['title'] ?> </h2>
                        <span class="date_last_posts"><?= $post['name'].' | '.$post['date']?> </span>   
               
                        <p><?= substr($post['description'], 0, 180) . "..." ?> </p>
                    </a>
                </article>
                <?php
            endwhile;
        endif;
        ?>
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