<?php
    session_start();
    include('connect.php');
    $errors = array();

    if(isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn , $_POST['username_res']);
        $name = mysqli_real_escape_string($conn , $_POST['name_res']);
        $password = mysqli_real_escape_string($conn , $_POST['password_res']);
        $email = mysqli_real_escape_string($conn , $_POST['email_res']);
        $tel = mysqli_real_escape_string($conn , $_POST['tel_res']);
        

    
        $user_check_query ="SELECT * FROM  restaurant  WhERE Res_nameID = '$username' OR Email= '$email' ";
        $query = mysqli_query($conn , $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['Res_nameID'] == $username){
                array_push($errors,"User already exists");
            }
            if($result['Email'] == $email){
                array_push($errors,"Email already exists");
            }

        }
        if(count($errors)==0){
            
            $sql = "INSERT INTO restaurant(Res_nameID,Name,Email,Password,Tel) VALUES ('$username','$name','$email','$password','$tel')";
            mysqli_query($conn,$sql);

            $_SESSION['username'] = $username;
            $_SESSION['nameres'] = $name;
            $_SESSION['success'] = "You are now logged in";
            header('Location: login_res.php');
        }
        else{
            array_push($errors,"Wrong username/password combination");
            $_SESSION['error'] = "Username or password is exits";
            header("location: register_res.php");
        }
    }
?>