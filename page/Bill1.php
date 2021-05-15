<?php 
    session_start();
    include('connect.php');
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $sumtime = $date.' '.$time;
    $buck =$_SESSION['bk_menuID'];
    $me= " SELECT menu.Name as name ,bucketmenu.count as count,bucketmenu.prices as prices ,bucketmenu.MenuID as MenuID   FROM bucketmenu INNER JOIN menu ON bucketmenu.MenuID  = menu.MenuID  WHERE bk_menuID = '$buck '";
    $objQuery = mysqli_query($conn, $me) or die("Error Query [". $me ."]");
    $pall = "SELECT SUM(prices) as sum  FROM bucketmenu WHERE bk_menuID = '$buck '";
    $objQuerypall = mysqli_query($conn, $pall) or die("Error Query [" . $pall . "]");
    $objResultpall = mysqli_fetch_array($objQuerypall);
    //$num = $_SESSION['num'];  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recipe</title>

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/Billstyle.css">
    <style>
    body {
        font-family: 'Chilanka', cursive, 'Mitr', sans-serif;
        font-size: 13px;
    }

    button {
        color: crimson;
    }

    .but {
        padding-left: 250px;
    }

    .containner {
        padding-left: 30px;
    }

    .button {
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button1 {
        background-color: white;
        color: black;
        border: 2px solid #750b33;
    }

    .button1:hover {
        background-color: white;
        color: white;
    }

    a {
        color: black;
    }

    input {
        background-color: pink;

    }

    .date {
        padding-left: 225px;
    }
    </style>
</head>

<body>

    <form class="login" action="payment.php" method="post">

        <center>
            <h3>MENU</h3>
        </center><br>
        <div class="date">
            <option>CustomerID : <?php echo $_SESSION['username']?></option>
            <option>Date : <?php echo $sumtime?></option>
            <br>
        </div>

        <?php
      $i = 1;
      while ($objResult = mysqli_fetch_array($objQuery)) {?>
        <?php echo $objResult["name"]; ?><br> จำนวน&nbsp;&nbsp;<?php echo $objResult["count"]; ?>
        &nbsp;ราคา&nbsp;:&nbsp;<?php echo $objResult["prices"];?>
        <a
            href="deletemenu.php?menuid=<?php echo $objResult["MenuID"];?>">-</a>
        or
        <a href="addmenu.php?menuid=<?php echo $objResult["MenuID"]; ?>">+</a>

        <a href="deleteall.php?menuid=<?php echo $objResult["MenuID"]; ?>">delete</a><br><br>
        <?php } ?>
        <option>Total : <?php echo  $objResultpall["sum"]; ?></option>
        <select name="payment">
            <option value="cash">cash</option>
            <option value="paypal">paypal</option>
        </select>
        <input type="hidden" name="menuid" value="<?php echo $objResultpall["sum"];?>">
        <input type="submit" name="submit" value="submit">

        <a href="resandmenu.php"> back </a>


    </form>

</body>

</html>