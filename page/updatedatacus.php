<?php 
    session_start();
    include('connect.php');
    if(!isset($_SESSION['username'])){
        header('location: resandmenu.php');
    }
   
?>
<meta charset="UTF-8">
<?php
    session_start();
    include('connect.php');

    $errors = array();

        $Cusname    = $_REQUEST['Cus_nameID'];
        $CusnameID   = $Cusname;
        $Email		  = $_REQUEST['Email'];
        $Tel		  = $_REQUEST['Cus_Tel'];
        $location              = $_REQUEST['Cus_Location'];

        //รับค่าไฟล์จากฟอร์ม
        $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');	

        //ฟังก์ชั่นวันที่
                date_default_timezone_set('Asia/Bangkok');
                $date = date("Ymd");	
        //ฟังก์ชั่นสุ่มตัวเลข
                $numrand = (mt_rand());
        //เพิ่มไฟล์
                $upload=$_FILES['fileupload'];
                if($upload != ' ') 
                {   //not select file
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


        $sql = "UPDATE customer SET Email = ' $Email',  Cus_Tel = '$Tel' , Cus_Location = '$location' WHERE Cus_nameID = '$Cusname'";

        $objQuery = mysqli_query($conn, $sql);

        if ($objQuery) 
        {
                header("location: resandmenu.php");
        } else {
                echo "Error : Update";
        }
?>
