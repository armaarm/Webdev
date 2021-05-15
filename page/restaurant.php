<?php
    session_start();
    include('connect.php');
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login_res.php');
    }
    if(isset($_GET['logout'])){
        unset($_SESSION['username']);
        header('location: login_res.php');
        session_destroy();
    }

?>

<!DOCTYPE html>
<html>

<head></head>

<body>

    <h1>Reastaurant Page</h1>
    <?php  if(isset($_SESSION)):?>
    <div class="success">
        <h3>
            <?php
                    
                        unset ($_SESSION['success']);
                    ?>
        </h3>
    </div>
    <?php endif ?>

    <div class="content">
        <!-- logged in user information -->
        <?php if(isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username'];?></strong></p>
        <p><a href="restaurant.php?  logout='1'" class>Logout</a></p>
        <?php endif ?>
    </div>
</body>

</html>