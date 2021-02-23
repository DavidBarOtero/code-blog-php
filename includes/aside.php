<?php require_once 'includes/helpers.php' ?>


<aside id="sidebar">
  <div id="finder" class="block-aside">
            <h3>Finder</h3>
            <form action="finder.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="search"/>
        <input type="submit" value="find">
            </form>
        </div>
    <?php if (isset($_SESSION['user'])): ?>
        <div id="logued-user" class="block-aside">
            <h3>Wellcome,<?= $_SESSION['user']['name'] . ' ' . $_SESSION['user']['last_name'] ?></h3>
            <ul class="panel">
                <li><a href="create-post.php" class="green-button" >New Post</a></li>
                <li><a  href="create-category.php" class="blue-button">New Category</a></li>  
                <li> <a  href="profile.php" class="orange-button">Profile</a></li>
                <li><a href="close.php" class="red-button">Exit</a></li>  
            </ul>
        </div>
    <?php else: ?>
        <div id="login" class="block-aside">
            <h3>Login</h3>
            <form action="login.php" method="POST" enctype="multipart/form-data">
                <label for="email">Email</label>
                <input type="text" name="email" />
                <label for="password">Password</label>
                <input type="password" name="password" />
                <input type="submit" name= "submit" value="Enter"/>
                <?php if (isset($_SESSION['login-error'])): ?>
                    <div id="error-alert" class="error-alert">
                        <h4><?= $_SESSION['login-error'] ?></h4>
                    </div>
                <?php endif ?>
            </form>
        </div>
    <?php endif ?>

    <?php if (!isset($_SESSION['user'])): ?>
        <div id="register" class="block-aside">
            <h3>Register</h3>
            <form action="register.php" method="POST" enctype="multipart/form-data" >
                <label for="name">Name </label>
                <input type="text" name="name" />
                <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'name') : ""; ?>
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" />
                <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'last_name') : ""; ?>
                <label for="email">Email</label>
                <input type="email" name="email" />
                <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'email') : ""; ?>
                <label for="password">Password</label>
                <input type="password" name="password" />
                <?php echo isset($_SESSION['errors']) ? show_error($_SESSION['errors'], 'password') : ""; ?>
                <input type="submit" name= "submit" value="Register"/>
            </form>
            <?php erase_errors(); ?>
        </div>
    <?php endif ?>
</aside>