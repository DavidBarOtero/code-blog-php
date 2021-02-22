<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>
<?php require_once 'includes/redirect.php'; ?>

<div id="main">
    <h1>Add Category</h1>
    <p>Add new categories for all users</p>
    <form action="save-category.php" method="POST">
        <label for="name">Name of Category:</label>
            <input type="text" name="name" placeholder="Give a name to the new category"/>

            <input type="submit" value="Save"/>

    </form>


</div>
<?php require_once 'includes/footer.php'; ?>
