<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php


require('connect.php');

$MenuID1      =$_REQUEST['MenuID'];
$Name1		  = $_REQUEST['Name'];
$Price1		  = $_REQUEST['Price'];

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


$sql = "UPDATE menu SET Name= ' $Name1',  Price = '$Price1' ,Image='$newname' WHERE MenuID = '$MenuID1'";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	
	header("location: store.php");
} else {
	echo "Error : Update";
}






?>