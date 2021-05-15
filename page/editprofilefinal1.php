<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Lobster&display=swap"
        rel="stylesheet">
    <meta charset="UTF-8">
    <title>Recipe</title>
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="../css/Billstyle.css">
    <style>
    body {
        font-family: 'Lobster', cursive;
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
        background-color: #f81894;
        color: white;
    }

    .needs-validation {
        padding: 10px 300px 300px;
    }

    .butt {
        text-align: right;
    }

    .image {
        text-align: center;
    }

    .inputtel {
        width: 20%;
    }

    .up {
        text-align: center;
    }

    .form-group {
        padding-left: 30px;
    }

    .a {
        font-style: 50px;
    }
    </style>
</head>

<body>


    <form class="login">
        <div class="image">
            <img src="https://th.bing.com/th/id/OIP.L-n64krE7mpgg1MsQ4QliQHaH1?w=190&h=201&c=7&o=5&dpr=1.25&pid=1.7"
                class="img-thumbnail" width="100px" height="100px">
        </div>
        <br><br>
    <?php
    include('connect.php');
    session_start();
    $u = $_SESSION['username'];
    $sql = "
    SELECT * 
    FROM customer WHERE Cus_nameID = '$u' ";

    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    $resultcus =  mysqli_fetch_array( $objQuery) ;

   
    ?>

        <div class="up">
            แก้ไขโปรไฟล์
            <!-- <input type="file" name="upload" /> -->
        </div><br>
        <form class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <a>Username</a>: <td><?php echo $resultcus['Cus_nameID'];?></td>
                </div>
            </div><br>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <a>Email</a>: <td><?php echo $resultcus['Email'];?></td><br><br>

                    <a>Tel.</a>: <td><input type="text" name="Cus_Tel"></td>
                </div>
            </div> <br>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <br><br>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Cus_Location"
                        style="padding:20px; margin-left:20px;"></textarea>
                </div>
                <div class="butt">
                    <button class="btn btn-primary" type="submit" formaction="updatedatacus.php"
                        method="post">Update</button>
                </div>

                <a href="resandmenu.php"> back </a>
            </form>
            <?php
    mysqli_close($conn); // ปิดฐานข้อมูล
    ?>

        </form>




</body>

</html>