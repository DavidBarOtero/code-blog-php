<?php require_once 'includes/helpers.php' ?>   
<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/connection.php' ?>
<?php require_once 'includes/aside.php'; ?>
<?php require_once 'includes/redirect.php'; ?>
<?php
$actual_post = detail_post($db, $_GET['id']);

if (!isset($actual_post['id'])) {

    header('location:index.php');
}
?>

<div id="main">
    <h1>Post Edit</h1>
    <p style="color:blue">Edit your post: "<?= $actual_post['title'] ?>"</p>
    <form action = "save-post.php?edit=<?=$actual_post['id']?>" method = "POST">

        <div style = "display: flex;flex-direction: row">
            <label for="category"><label/>
                <select name="category" style="width: 30%;height: 100%;padding: 3px">
                    <?php
                    $categories = get_categories($db);
                    if (!empty($categories)):

                        while ($category = mysqli_fetch_assoc($categories)):
                            ?> 

                            <option   value="<?= $category['id'] ?>" <?= ($category['id']) == $actual_post['category_id'] ? 'selected=selected' : '' ?>> <?= $category['name'] ?></option>
                            <?php
                        endwhile;
                    endif;
                    ?>
                    <select/>

                    <label for="title">Title:<label/>
                        <input type="text" name="title" value="<?= $actual_post['title'] ?>" />
                        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'title') : ""; ?>

                        <label for="description">Description:</label>
                        <textarea class="description"  name="description" rows="5" cols="10" style="width: 540px;height: 140px"><?= $actual_post['description'] ?></textarea> 
                        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'description') : ""; ?>

                        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'category') : ""; ?>

                        <input type="submit" value="Save" style="margin-top:5px;"/>



                        </form>
                        </div>
                        </div>
                        <?php require_once 'includes/footer.php'; ?>



