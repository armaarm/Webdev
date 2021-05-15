<?php 
    session_start();
    include('connect.php');
    $errors =array();
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $sumtime = $date.' '.$time;

    if(isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);


        if(count($errors)==0){
            
            $query = "SELECT * FROM customer WHERE Cus_nameID  = '$username' AND Cus_Password ='$password' ";
            $result = mysqli_query($conn , $query);
            $AS =  mysqli_fetch_assoc($result);
            //$bucketID = $AS['bucketID'];
           $namecus = $AS['Name'];
          
            echo "<script>alert(' User : $namecus')</script>";
          
            if( mysqli_num_rows($result) == 1){
                    // $_SESSION['bucketID'] = $bucketID;
                    $_SESSION['username'] =  $username ;
                    $_SESSION['success'] = "Your are now logged in";
                    $_SESSION['name'] =  $namecus;
                    //$_SESSION['bucket']=$bucketID;
                    $_SESSION['bk_menuID']= uniqid();
                    $bk_ID=$_SESSION['bk_menuID'];
                    $addbucket= "INSERT INTO bucket(bk_menuID,Datetime) VALUES ('$bk_ID','$sumtime')";
                    $resultaddbucket = mysqli_query($conn ,$addbucket);
                    header("location: resandmenu.php");

            }else{
                array_push($errors,"Wrong username/password combination");
                $_SESSION['error'] = "Wrong username or password or try again";
                header("location: login_user.php");
            }
        }
    }

?>