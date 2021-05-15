<meta charset="UTF-8">
<?php
   
    session_start();
    include('connect.php'); 
    $num=$_GET['num']; 
    $_SESSION['num']=$num;
    $menuid=$_GET['menuid'];
    $priceid=$_GET['price'];
    $bk_menuID= $_SESSION['bk_menuID'];
    $user=$_SESSION['username'];
    echo "<script>alert('user : $user bk_menuID : $bk_menuID   menuid : $menuid   priceid :  $priceid  num  : $num ')</script>";
    
    /*$checkbucket = "SELECT * FROM  bucketmenu WHERE bk_menuID = '$bk_menuID'  AND MenuID = '$menuid' ";
    $querycheckbucket = mysqli_query($conn, $checkbucket);
    $result_checkbucket = mysqli_fetch_assoc($querycheckbucket);
    $productcount = $result_checkbucket['count'];
    $productcount =  $productcount+ $num;
    $sum = $productcount* $priceid;
    $UPDATE_bucket = "
                             UPDATE bucketmenu
                            SET count = '" . $productcount . "',
                            prices = '" . $sum . "'
                            WHERE  Cus_nameID = '$user' && bk_menuID = '$bk_menuID' && MenuID = '$menuid' ";*/


?>