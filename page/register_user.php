<?php
        session_start();
        include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register User</title>
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylepage.css">

</head>

<body>


    <form class="register" action="register_db.php" method="post" action="/action_page.php">

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
        <p>Register User</p>
        <lable>Username <sub>(Must contain at least one number and one uppercase and lowercase letter, and at least 6-20
                characters)</sub></lable>

        <input type="text" name="name_user" placeholder="Name"
            pattern="(?=^.{6,20}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required autofocus>
        Password
        <sub>Password(Must contain at least one number and one uppercase and lowercase letter, and at least 8-20
            characters)</sub>
        <input type="password" name="password_user" placeholder="Password"
            pattern="(?=^.{8,20}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
        Email
        <input type="email" name="email_user" placeholder="Email" required>
        Tel
        <input type="text" name="tel_user" placeholder="Tel" required>
        Location
        <input type="text" name="lo_user" class="sizeLo" placeholder="Location" required>
        <button type="submit" name="reg_user" href="login_user.php">OK</button>


    </form>


</body>

</html>