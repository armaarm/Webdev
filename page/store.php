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

<head>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Lobster&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="style/storestyle.css">

    <title>Store</title>
    <style>
    html {
        height: 100%;

    }

    body {
        margin: 0;
        background: linear-gradient(45deg, #49a09d, #5f2c82);
        font-family: sans-serif;
        font-weight: 100;
        font-family: 'Lobster', cursive;
        font-family: "Asap", sans-serif;
    }

    input[type=text] {
        width: 100%;
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

    .container1 {
        margin-top: auto;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: auto;


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
        margin-left: 45%;
        margin-top: 30px;
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

    h3 {

        color: white;
    }

    .update {}
    </style>
</head>

<body>

    <?php  if(isset($_SESSION)):?>
    <div class="success">


        <center>
            <h3>Welcome <strong><?php echo $_SESSION['username'];?></strong></h3>

            <div class="content">
                <!-- logged in user information -->
                <?php if(isset($_SESSION['username']) ) : ?>
                <p><a href="store.php?  logout='1'" class>Logout</a></p>
                <?php endif ?>

            </div>
        </center>


        <?php endif ?>


        <?php
        $codeueser = $_SESSION['username'];
        $sql = " SELECT *  FROM menu WHERE Res_nameID='$codeueser'";
      
        $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
        ?>



        <div class="add">

            <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">ADD</button>
            <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">UPDATE</button>


        </div>

        <div id="id01" class="modal">

            <form class="modal-content animate" actionmename="/action_page.php" method="post" action="store_db.php"
                enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close"
                        title="Close Modal">&times;</span>

                </div>


                <div class="container">



                    <label for="mename"><b>name</b></label><br>
                    <input type="text" placeholder="Name" name="mename" required><br>

                    <label for="mepri"><b>Price</b></label><br>
                    <input type="text" placeholder="Price" name="mepri" required><br><br>

                    <label for="upload"><b>Image</b></label>
                    <input type="file" name="fileupload"><br><br>

                    <button type="submit" name="store_add" href="store.php">Add</button>

                </div>

            </form>



        </div>






        <div id="id02" class="modal">

            <form class="modal-content animate" actionmename="/action_page.php" method="post" action="updatedata.php"
                enctype="multipart/form-data">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close"
                        title="Close Modal">&times;</span>

                </div>


                <div class="container">
                    <form action="updatedata.php" method="post" name="update">
                        <label><b>MenuID:</b></label>
                        <select name="MenuID">
                            <?php
                        while ($objResult = mysqli_fetch_array($objQuery)) {
                        ?>
                            <option value=<?php echo $objResult["MenuID"]; ?>><?php echo $objResult["MenuID"]; ?>
                            </option>
                            <?php
                        }
                        ?>
                        </select>
                        <br><br>
                        <label><b>Name(menu):</b></label>
                        <input type="text" name="Name" require>
                        <br>
                        <label><b>Price:</b></label>
                        <input type="text" name="Price" require>
                        <br>
                        <label for="upload"><b>Image</b></label>
                        <input type="file" name="fileupload"><br><br>
                        <button type="submit" style="width:auto;" value="Update" name="ok">Update</button>


                    </form>


                </div>

            </form>



        </div>






        <div>

            <center>

                <?php  
                  
                    $check = $_SESSION['username'];
                    $sql = "SELECT * FROM menu WHERE Res_nameID ='$check'";
                    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                   
                    
                    
                
                ?>


                <table border="1" class="container1">
                    <tr>
                        <th width="50">
                            <div align="center">RestaurantID</div>
                        </th>
                        <th width="50">
                            <div align="center">Menu</div>
                        </th>
                        <th width="100">
                            <div align="center">Name</div>
                        </th>
                        <th width="100">
                            <div align="center">Price</div>
                        </th>
                        <th width="100">
                            <div align="center">Image</div>
                        </th>
                        <th width="100">
                            <div align="center">Delete</div>
                        </th>


                    </tr>
                    <?php
                    $i = 1;
                    while ($objResult = mysqli_fetch_array($objQuery)) {
                    ?>


                    <tr>

                        <td><?php echo $objResult["Res_nameID"]; ?></td>
                        <td><?php echo $objResult["MenuID"]; ?></td>
                        <td><?php echo $objResult["Name"]; ?></td>
                        <td><?php echo $objResult["Price"]; ?></td>
                        <td><?php echo "<img src='../fileupload/".$objResult["Image"]."' width='100' >"; ?></td>
                        <td align="center"><a href="deletedata.php?menu=<?php echo $objResult["MenuID"]; ?>">Delete</a>
                        </td>


                    </tr>

                    <?php $i++;
                    }  ?>
                </table>
            </center>


        </div>


        <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }


        var modal1 = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }
        </script>



</body>

</html>