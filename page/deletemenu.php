<?php
    session_start();
    include('connect.php');

    $menuid = $_REQUEST['menuid'];
    //$prices  = $_REQUEST['prices'];
    $buck = $_SESSION['bk_menuID'];
    $user= $_SESSION['username'];
   /* echo "<script>alert('$menuid')</script>";
    echo "<script>alert('$prices')</script>";
    echo "<script>alert('$buck')</script>";
    echo "<script>alert('$user')</script>";*/
    $Qprices=" SELECT * FROM menu  WHERE MenuID  ='$menuid' ";
    $selectprices= mysqli_query($conn, $Qprices );
    $resultprices =  mysqli_fetch_array($selectprices) ;
    $p= $resultprices['Price'];
    //echo "<script>alert('p  : $p')</script>";

    $selectcount = " SELECT * FROM bucketmenu  WHERE bk_menuID  ='$buck' AND Cus_nameID = '$user' AND  MenuID = '$menuid' ";
    $querycount= mysqli_query($conn, $selectcount );
    $resultcount =  mysqli_fetch_array($querycount) ;
    $newcount= $resultcount['count'];echo "<script>alert('$newcount')</script>";


    if($newcount > 1){
        $newcount = $newcount-1;
        $newprices = $newcount * $p;
        
        $update_bucketmenu= "
            UPDATE bucketmenu
            SET count = '" . $newcount . "',
            prices = '" . $newprices . "'
            WHERE  Cus_nameID = '$user' && bk_menuID = '$buck' && MenuID = '$menuid' ";
            if (mysqli_query($conn, $update_bucketmenu) ) {
                //echo "<script>alert('Update Success')</script>";
                header("Refresh:0; url=Bill1.php");
            } else {
                echo mysqli_error($conn);
                echo "<script>alert('Update failed'')</script>";
            }

    }
    else {  
        $bucketmenudelete = "DELETE FROM bucketmenu  WHERE Cus_nameID = '$user' && bk_menuID = '$buck' && MenuID = '$menuid' ;";
        if(mysqli_query($conn, $bucketmenudelete)){
            //echo "<script>alert('Delete Success')</script>";
            header("Refresh:0; url=Bill1.php");
        }else{
            echo mysqli_error($conn);
            echo "<script>alert('Delete failed')</script>";
        }
    }

?>