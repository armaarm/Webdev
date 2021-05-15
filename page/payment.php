<?php

    session_start();
    include('connect.php');
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $sumtime = $date." ".$time;
  
    if(isset($_POST['submit'])){
      
        $o=$_POST['payment'];

        if($o =="cash"){
            $payment = '40626301';

        }
        if($o =="paypal"){
            $payment = '40626302';
        }
       

    $buck =$_SESSION['bk_menuID'];
    $user= $_SESSION['username'];
    //$num=$_GET['num']; 
   // $_SESSION['num']=$num;
    //$menuid=$_GET['menuid'];
    //$priceid=$_GET['price'];
    $bk_menuID= $_SESSION['bk_menuID'];

    $pall = "SELECT SUM(prices) as sum FROM bucketmenu WHERE bk_menuID = '$buck '";
    $objQuerypall = mysqli_query($conn, $pall) or die("Error Query [" . $pall . "]");
    $objResultpall = mysqli_fetch_array($objQuerypall);
    $pall = $objResultpall["sum"];
    $insert = " INSERT INTO bill(Cus_nameID,RiderID,bk_menuID,Total_Price,PaymentID,Datetime) VALUES ('$user','252621','$buck','$pall','$payment','$sumtime')";
    
    if($pall ==''){
        echo "<script>alert('คุณยังไม่ได้เลือกอาหาร')</script>";//แจ้งเตือน
        header("Refresh:0; url=Bill1.php");
    }else if(mysqli_query($conn, $insert)) {
        echo "<script>alert('Success')</script>";//แจ้งเตือน
        $_SESSION['bk_menuID']= uniqid();
        $bk_ID=$_SESSION['bk_menuID'];
        $addbucket= "INSERT INTO bucket(bk_menuID,Datetime) VALUES ('$bk_ID','$sumtime')";
        $resultaddbucket = mysqli_query($conn ,$addbucket);
        header("Refresh:0; url=resandmenu.php");

    }
    else {
        echo mysqli_error($conn);
        echo "<script>alert('failed')</script>";
    }
}

?>