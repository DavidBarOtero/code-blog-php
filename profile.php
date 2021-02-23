<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>
<?php require_once 'includes/redirect.php'; ?>

<div id="main">
    <h1>Profile</h1>
    <p>Edit your account profile</p>
    <form action="edit-profile.php" method="POST" enctype="multipart/form-data" >
        <label for="name">Name </label>
        <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>" />
        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'name') : ""; ?>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="<?= $_SESSION['user']['last_name'] ?>"/>
        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'last_name') : ""; ?>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>"/>
        <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'email') : ""; ?>
        <input type="submit" name= "submit" value="Update"/>
    </form>
</div>
<?php require_once 'includes/footer.php'; ?>