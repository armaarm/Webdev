<?php
        session_start();
        include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register Restaurant</title>
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylepage.css">

</head>

<body>


    <form class="register" action="register_resdb.php" method="post" action="/action_page.php">

        <img src="../img/food-panda.png" class="imgregis">
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
        <p>Register Restaurant</p>
        <lable>Username <sub>(Must contain at least one number and one uppercase and lowercase letter, and at least 6-20
                characters)</sub></lable>

        <input type="text" name="username_res" placeholder="Username"
            pattern="(?=^.{6,20}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required autofocus>
        Name(Restaurant)
        <input type="text" name="name_res" placeholder="Name" " required autofocus>
        Password
        <sub>Password(Must contain at least one number and one uppercase and lowercase letter, and at least 8-20 characters)</sub>
        <input type=" password" name="password_res" placeholder="Password"
            pattern="(?=^.{8,20}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
        Email
        <input type="email" name="email_res" placeholder="Email" required>
        Tel
        <input type="text" name="tel_res" placeholder="Tel" required>

        <button type="submit" name="reg_user" href="login_res.php">OK</button>

    </form>


</body>

</html>