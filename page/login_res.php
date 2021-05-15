<?php
        session_start();
        include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Restaurant</title>
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylepage.css">

</head>

<body>
    <form class="login" action="login_resdb.php" action="store.php" method="post">


        <img src="../img/food-panda.png" class="imglogin">
        <?php include('errors.php');?>
        <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <h3>
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </h3>
        </div>
        <?php endif ?>

        <h3>Login Restaurant</h3>
        Username
        <input type="text" placeholder="example" name="username" autofocus required>
        Password
        <input type="password" placeholder="Password" name="password" required>

        <br>
        <button type="submit" name="login_res" herf="restaurant.php">login</button>
        <a href="register_res.php">Register</a>

    </form>

</body>

</html>