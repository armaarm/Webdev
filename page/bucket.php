<meta charset="UTF-8">
<?php
   
    session_start();
     include('connect.php'); 
   
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $sumtime = $date.' '.$time;
   

   // $bucketID=$_SESSION['bucketID'];
    
    
if (isset($_GET['submit'])) {

    //$num=$_GET['number']; 
   // $_SESSION['num']=$num;
    $menuid=$_GET['menuid'];
    $priceid=$_GET['price'];
    $bk_menuID= $_SESSION['bk_menuID'];
    $user=$_SESSION['username'];
    $res_id= $_SESSION['res_id'];
   
    //echo "<script>alert('user : $user bk_menuID : $bk_menuID   menuid : $menuid   priceid :  $priceid     res_id :  $res_id')</script>";

    
    //$Res_nameID = $_GET['resid'];
    //echo "<script>alert('คนซื้อ : $user เมนู :  $menuid  ราคา : $priceid')</script>";
    $checkbucket = "SELECT * FROM  bucketmenu WHERE bk_menuID = '$bk_menuID'  AND MenuID = '$menuid' ";
    $querycheckbucket = mysqli_query($conn, $checkbucket);

   
  
                    if(mysqli_num_rows($querycheckbucket) == 0){ //ไม่มีสินค้า
                        $addcart_product = "INSERT INTO bucketmenu(Cus_nameID,bk_menuID,MenuID,count,prices) VALUES ('$user','$bk_menuID','$menuid','1','$priceid')";
                        if(mysqli_query($conn, $addcart_product)) {
                            //echo "<script>alert('Success')</script>";
                            header("Refresh:0; url=menu.php?resid=$res_id");
                        }
                        else {
                            echo mysqli_error($conn);
                            echo "<script>alert('failed11111')</script>";
                            header("Refresh:0; url=resandmenu.php");
                        }
                    }
                    // else{ //มีสินค้า  ลองรันดู
                    //     $result_checkbucket = mysqli_fetch_assoc($querycheckbucket);
                    //     $productcount = $result_checkbucket['count'];
                    //     $productcount =  $productcount+ 1;
                    //     $sum = $productcount* $priceid;
                    //     $UPDATE_bucket = "
                    //         UPDATE bucketmenu
                    //         SET count = '" . $productcount . "',
                    //         prices = '" . $sum . "'
                    //         WHERE  Cus_nameID = '$user' && bk_menuID = '$bk_menuID' && MenuID = '$menuid' ";
                            
                    //     if(mysqli_query($conn,  $UPDATE_bucket)) {
                    //         echo "<script>alert('Success add ซ้ำ')</script>";
                    //         header("Refresh:0; url=menu.php?resid=$res_id");
                    //     }
                    //     else {
                    //         echo mysqli_error($conn);
                    //         echo "<script>alert('user : $user bk_menuID :  $bk_menuID  MenuID : $menuid')</script>";
                    //         //echo "<script>alert('failedzz')</script>";
                    //         header("Refresh:0; url=resandmenu.php");
                    //     }
                    // }
   
}
     
  

?>