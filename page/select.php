<?php 
    session_start();
    include('connect.php');
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login_user.php');
    }
    if(isset($_GET['logout'])){
        unset($_SESSION['username']);
        header('location: login_user.php');
        session_destroy();
    }
?>
<html lang="en-US">

<head>
    <meta charset="UTF-8">

    <style>
    html {
        height: 100%;

    }

    body {
        margin: 10;
        background: linear-gradient(45deg, #49a09d, #5f2c82);
        font-family: sans-serif;
        font-weight: 100;
        font-family: 'Lobster', cursive;
        font-family: "Asap", sans-serif;
    }

    input[type=text] {
        width: 20%;
        height: 3%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
        background-color: #f0177c;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }


    .container {
        padding: 16px;
    }



    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 30%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    .add {
        margin-left: 40%;
        margin-top: auto;
    }





    .container1 {
        margin-top: auto;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: auto;
    }

    table {
        width: 800px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    th {
        text-align: left;
    }

    thead {
        th {
            background-color: #55608f;
        }
    }

    tbody {
        tr {
            &:hover {
                background-color: rgba(255, 255, 255, 0.3);
            }
        }

        td {
            position: relative;

            &:hover {
                &:before {
                    content: "";
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: -9999px;
                    bottom: -9999px;
                    background-color: rgba(255, 255, 255, 0.2);
                    z-index: -1;
                }
            }
        }
    }

    h1,
    h4 {

        color: white;
    }
    </style>
</head>

<body>

    <center>
        <h1>Select Restaurant</h1>

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

            <h4>Welcome <strong><?php echo $_SESSION['username'];?></strong></h4>

            <p><a href="login_user.php?  logout='1'" class>Logout</a></p>


            <?php endif ?>
        </div>
        <?php
  require('connect.php');

  $sql = '
    SELECT * 
    FROM restaurant;
    ';

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>

        <form action="home.php" method="GET" name="menu">

            <tr>
                <td><input type="text" name="keyword"></td>
            </tr>

            <input type="submit" value="Search Data">
        </form>

        <?php


  ?>
        <center>
            <table border="1">

                <tr>

                    <th width="200">
                        <div align="center">Name Restaurant</div>
                    </th>


                </tr>

                <?php
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>

                <tr>

                    <td align="center"><?php echo $objResult["Name"]; ?></td>


                </tr>

                <?php
      $i++;
    }
    ?>
            </table>

            <?php
  mysqli_close($conn); // ปิดฐานข้อมูล
  echo "<br><br>";
  
  ?>
        </center>
</body>

</html>