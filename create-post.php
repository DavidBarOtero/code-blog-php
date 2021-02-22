<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>
<?php require_once 'includes/redirect.php'; ?>

<div id="main">
    <h1>Add Post</h1>
    <p>Add new posts to all users</p>
    <form action="save-category.php" method="POST">
        <label for="title">Title:<label/>
            <input type="text" name="title" />
            <label for="description">Text:</label>
                <input type="text" name="description" />
                <label for="category"><label/>
                    <select name="categories">
                        <?php
                        $categories = get_categories($db);
                        if (!empty($categories)):

                            while ($category = mysqli_fetch_assoc($categories)):
                                ?> 
                        
                        <option value="<?=$category['id']?>"> <?= $category['name'] ?></option>
                            <?php endwhile;
                        endif; ?>

                        <select/>
                        <input type="submit" value="Save"/>
                        </form>

                        </div>
<?php require_once 'includes/footer.php'; ?>