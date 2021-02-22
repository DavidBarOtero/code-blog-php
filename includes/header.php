<?php require_once 'connection.php'
?>
<?php require_once 'helpers.php'
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Code Blog </title>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <header id="header">
            <div id="logo">

                <a href="index.php">
                    Code Blog
                </a>
            </div>
            <?php $categories=get_categories($db);   ?>
          
            
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Index</a>
                    </li>
            <?php  while($category= mysqli_fetch_assoc($categories)):  ?>
             <li>
                 <a href="category.php?id=<?=$category['id']?>"><?= $category['name']?></a>
                    </li>
            <?php endwhile; ?>
                       <li>
                        <a href="index.php">About me</a>
                    </li>
                       <li>
                        <a href="index.php">Contact</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
 