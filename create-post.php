<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>
<?php require_once 'includes/redirect.php'; ?>

<div id="main">
    <h1>Add Post</h1>
    <p>Add new posts to all users</p>
    <form action="save-post.php" method="POST">

        <div style="display: flex;flex-direction: row">
            <p >Select category</p>

            <label for="category"><label/>
                <select name="category" style="width: 30%;height: 100%;padding: 3px">
                    <?php
                    $categories = get_categories($db);
                    if (!empty($categories)):

                        while ($category = mysqli_fetch_assoc($categories)):
                            ?> 

                            <option   value="<?= $category['id'] ?>"> <?= $category['name'] ?></option>
                            <?php
                        endwhile;
                    endif;
                    ?>
                    <select/>


                    </div>

                    <label for="title">Title:<label/>
                        <input type="text" name="title" />
                        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'title') : ""; ?>

                        <label for="description">Description:</label>
                        <textarea class="description" name="description" rows="5" cols="10" style="width: 540px;height: 140px"></textarea> 
                        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'description') : ""; ?>

                        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'category') : ""; ?>

                        <input type="submit" value="Save" style="margin-top:5px;"/>



                        </form>
                        </div>
                        <?php require_once 'includes/footer.php'; ?>