<?php 
    session_start();
    include('connect.php');
    if(!isset($_SESSION['username'])){
        header('location: resandmenu.php');
    }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Patrick Hand', cursive;
            background-color: rgb(236, 20, 128);
        }
        
        thead {
            background-color: white;
        }
        
        .container {
            padding-top: 50px;
        }
        
        .butt {
            font-size: 24px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
  require('connect.php');
  
  $sql="  SELECT *  FROM bill AS d1
  INNER JOIN Bucketmenu  AS d2
  ON  (d1.bk_menuID = d2.bk_menuID) 
   INNER JOIN menu  AS d3
  ON  (d2.MenuID = d3.MenuID); ";
 

  
  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
        <div class="container">
            <h1>Purchase History</h1>
            <table class="table" border="3px">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>RiderID</th>
                        <th>Name</th>
                        <th>Count</th>
                        <th>Price/Unit</th>
                        <th>Price</th>
                        <th>TotalPrice</th>
                        <th>Datetime</th>
                    </tr>
                </thead>
        </div>

        <?php
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
            <tbody>
                <div align="center">
                </div>
                <tr>
                    <td>
                        <?php echo $objResult["OrderID"]; ?>
                    </td>
                    <td>
                        <?php echo $objResult["RiderID"]; ?>
                    </td>
                    <td>
                        <?php echo $objResult["Name"]; ?>
                    </td>
                    <td>
                        <?php echo $objResult["count"]; ?>
                    </td>
                    <td>
                        <?php echo $objResult["Price"]; ?>
                    </td>
                    <td>
                        <?php echo $objResult["prices"]; ?>
                    </td>
                    <td>
                        <?php echo $objResult["Total_Price"]; ?>
                    </td>
                    <td>
                        <?php echo $objResult["Datetime"]; ?>
                    </td>
                </tr>
            </tbody>
            <?php
      $i++;
    }
    ?>
                </table>
                <div class="butt">
                    <a href="resandmenu.php" class="btn btn-secondary btn-lg active">Back</a>
                </div>

                <?php
  mysqli_close($conn); // ปิดฐานข้อมูล
  ?>
</body>

</html>