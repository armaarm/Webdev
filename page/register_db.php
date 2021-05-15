<?php
    session_start();
    include('connect.php');

    $errors = array();
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $sumtime = $date.' '.$time;


    if(isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn , $_POST['name_user']);
        $password = mysqli_real_escape_string($conn , $_POST['password_user']);
        $email = mysqli_real_escape_string($conn , $_POST['email_user']);
        $tel = mysqli_real_escape_string($conn , $_POST['tel_user']);
        $location = mysqli_real_escape_string($conn , $_POST['lo_user']);

    
        $user_check_query ="SELECT * FROM  customer  WhERE Cus_nameID = '$username' OR Email= '$email' ";
        $query = mysqli_query($conn , $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['Cus_nameID'] == $username){
                array_push($errors,"User already exists");
            }
            if($result['Email'] == $email){
                array_push($errors,"Email already exists");
            }

        }
        if(count($errors)==0){
            //สร้างตะกร้า
            $bucket = " INSERT INTO bucket (Date) VALUES ('$sumtime');";
          



            if(mysqli_query($conn, $bucket)) {
                $codecart  = "SELECT * FROM bucket WHERE Date = '$sumtime'";
                $query2= mysqli_query($conn, $codecart);
                $result2 = mysqli_fetch_assoc($query2);
                $coode = $result2['bucketID'];
            }
            else {
                echo mysqli_error($conn);
            }
            $sql = "INSERT INTO customer(Cus_nameID,Cus_Password,Email,Cus_Tel,Cus_Location,bucketID) VALUES ('$username','$password','$email','$tel','$location',' $coode')";
            mysqli_query($conn,$sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";

            
            header('Location: login_user.php');
        }
        else{
            array_push($errors,"Wrong username/password combination");
            $_SESSION['error'] = "Username or password is exits";
            header("location: register_user.php");
        }
    }
?>