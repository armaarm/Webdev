<meta charset="UTF-8">
<?php
    session_start();
    include('connect.php');

    $errors = array();

 
    if(isset($_POST['store_add'])){
       
        $price = mysqli_real_escape_string($conn , $_POST['mepri']);
        $menu = mysqli_real_escape_string($conn , $_POST['mename']);
        $codeueser = $_SESSION['username'];
    
        //รับค่าไฟล์จากฟอร์ม
        $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');	

//ฟังก์ชั่นวันที่
        date_default_timezone_set('Asia/Bangkok');
	    $date = date("Ymd");	
//ฟังก์ชั่นสุ่มตัวเลข
         $numrand = (mt_rand());
//เพิ่มไฟล์
        $upload=$_FILES['fileupload'];
        if($upload != ' ') {   //not select file
//โฟลเดอร์ที่จะ upload file เข้าไป 
        $path="../fileupload/";  

//เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
        $type = strrchr($_FILES['fileupload']['name'],".");
	
//ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
        $newname = $date.$numrand.$type;
        $path_copy=$path.$newname;
        $path_link="fileupload/".$newname;

//คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
        move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	



    }
       
       
        $sql = "INSERT INTO menu(Res_nameID,Price,Name,Image) VALUES ('$codeueser','$price','$menu','$newname')";     
        $result1 =mysqli_query($conn,$sql);

        
        
        header("location: store.php");

    }


    
?>