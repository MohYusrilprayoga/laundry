<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry</title>
    <link rel="stylesheet" href="view/style.css">
    <link rel="icon" href="logo.png">
</head>
<body>

<header>
    <h1>LAUNDRY</h1>

<nav>
    <font color='white'><?php if(!isset($_SESSION['user']) ){ ?>
    <a href="register.php">Register</a>
    <a href="login.php">login</a>

    <?php }else{ ?>
    <?php } ?>
</nav>
</header>

    
