<?php 
    session_start();
    include('connect.php');
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login_user.php');
    }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CUSTOMER</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    #Asd {
        background-color: #D70F64;
        font-size: 24px;
    }

    .Saercing {
        text-align: center;
    }

    .shop {
        padding-left: 50px;
        padding-right: 50px;
    }

    .wrapper {
        display: block;
        min-height: 100%;
        /* real browsers */
        height: auto !important;
        /* real browsers */
        height: 100%;
        /* IE6 bug */
        margin-bottom: -40px;
        /* กำหนด margin-bottom ให้ติดลบเท่ากับความสูงของ footer */

        background-color: #FF0044;
        text-align: center;

    }

    .footer {
        height: 40px;

        /* ความสูงของ footer */
        display: block;
        text-align: center;
    }

    p {
        color: white;
    }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" id="Asd">

        <div class="container">
            <a class="navbar-brand" href="resandmenu.php"><img src="../img/iconpanda.png" alt="icon" width="40px"
                    height="40px"></a>
            <p>FOODPANDA</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto navbar-light">

                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="background-color:#BEBEBE;">
                                PROFILE

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="editprofilefinal1.php">แก้ไขโปรไฟล์</a>
                                <a class="dropdown-item" href="lastbill.php">ประวัติการสั่งซื้อ</a>
                                <a class="dropdown-item" href="login_user.php">LOGOUT</a>
                            </div>
                        </div>
                    </li>

                </ul>


                &nbsp;<a href="Bill1.php"><img src="../img/cat.png"></a>
            </div>
        </div>
    </nav>

    <br><br><br><br>
    <form class="Saercing" action="home.php" method="GET" name="menu">
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Saerch</label>
            <input type="text" placeholder="ค้นหา" name="keyword" aria-label="Search">
            <button type="submit">
                <img src="../img/download.png" width="10px" height="10px"></button>
        </div>

    </form><br><br><br>

    <?php
  $keyword  = $_REQUEST['keyword'];
  require('connect.php');

  $sql = "
    SELECT * 
    FROM menu
    WHERE Name LIKE '%" . $keyword . "%';
    ";

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
?>

    <!--เมนู-->
    <div class="row">
        <?php
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
        <div class="col-sm">
            <div class="card" style="width:302px;">
                <?php $pa = "../fileupload/";
                  $objResult1 = $pa.$objResult["Image"];
           ?>
                <?php echo '<img style="width: 300px; height: 250px;" class="card-img-top" src="'. $objResult1.'" /><br />'; ?>

                <div class="card-body">
                    <h5 class="card-title"><?php echo $objResult["Name"]; ?></h5>

                    <h7 class="card-text"><?php echo $objResult["Price"]; ?> บาท</h7>

                    <form action="bucket.php" method="GET" enctype="multipart/form-data">

                        <input type="hidden" name="menuid" value="<?php echo $objResult["MenuID"];?>">
                        <input type="hidden" name="price" value="<?php echo $objResult["Price"];?>">

                        <button class="button" name="submit" type="submit">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        <br> <br> <br>

        <?php
      $i++;
    }
    ?>
    </div>
    <script src=js/"bootstrap.min.js"></script>

    <div class="wrapper">
        <h5>เกี่ยวกับเรา</h5>


        <p><a href="#">สื่อมวลชนสัมพันธ์</a>
            <a href="#">ข้อมูลและการช่วยเหลือ </a>
            <a href="#">ข้อตกลงและเงื่อนไข</a>
            <a href="#">นโยบายความเป็นส่วนตัว</a>
        </p>
        <p><a href="#">นโยบายการคืนเงิน </a>
            <a href="register_res.php">สมัครเข้าร่วมเป็นร้านอาหารใน foodpanda </a>
            <a href="#"> สมัครงานกับ foodpanda ฟู้ดแพนด้าห่วงใย</a>
        </p>
        <p><a href="#">ส่วนลดจากพาร์ทเนอร์ </a>
            <a href="#">pandamart </a>
            <a href="#">โค้ดส่วนลด & โปรโมชั่นจาก foodpanda</a>
        </p>

    </div>
</body>

</html>