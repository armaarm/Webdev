<?php

 include('connect.php');
 session_start();
    $menuid = $_REQUEST['menuid'];
    //$prices  = $_REQUEST['prices'];
    //$_SESSION['p']=$prices;
    $buck = $_SESSION['bk_menuID'];
    $user= $_SESSION['username'];
    // echo "<script>alert('$menuid')</script>";
    // echo "<script>alert('$prices')</script>";
    // echo "<script>alert('$buck')</script>";
    // echo "<script>alert('$user')</script>";
    $Qprices=" SELECT Price FROM menu  WHERE MenuID  ='$menuid'  ";
    $selectprices= mysqli_query($conn, $Qprices );
    $resultprices =  mysqli_fetch_array($selectprices) ;
    $p= $resultprices['Price'];
   // echo "<script>alert('p  : $p')</script>";

    $selectcount = " SELECT * FROM bucketmenu  WHERE bk_menuID  ='$buck' AND Cus_nameID = '$user' AND  MenuID = '$menuid' ";
    $querycount= mysqli_query($conn, $selectcount );
    $resultcount =  mysqli_fetch_array($querycount) ;
    $newcount = $resultcount['count'];
    $newcount = $newcount+1;
    $newprices = $newcount * $p;
    //echo "<script>alert('.$newprices.' + '.$prices.')</script>";
    $update_bucketmenu= "
        UPDATE bucketmenu
        SET count = '" . $newcount . "',
        prices = '" . $newprices . "'
        WHERE  Cus_nameID = '$user' && bk_menuID = '$buck' && MenuID = '$menuid' ";

        if ( mysqli_query($conn,$update_bucketmenu ) ) {
            //echo "<script>alert('add Success')</script>";
            header("Refresh:0; url=Bill1.php");
        } else {
            echo mysqli_error($conn);
            echo "<script>alert('add failed'')</script>";
        }

?>