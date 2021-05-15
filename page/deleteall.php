<?php

    session_start();
    include("connect.php");
    
    $menuid = $_REQUEST['menuid'];
    $buck = $_SESSION['bk_menuID'];
    $user= $_SESSION['username'];

    $bucketmenudelete = "DELETE FROM bucketmenu  WHERE Cus_nameID = '$user' && bk_menuID = '$buck' && MenuID = '$menuid' ;";
        if(mysqli_query($conn, $bucketmenudelete)){
            //echo "<script>alert('Delete Success')</script>";
            header("Refresh:0; url=Bill1.php");
        }else{
            echo mysqli_error($conn);
            echo "<script>alert('Delete failed')</script>";
        }

?>