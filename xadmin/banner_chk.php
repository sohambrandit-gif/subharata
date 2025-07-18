<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$page=$_GET['page'];
$link=$_POST['link'];

echo	 $sql1 = "update banner set link='$link' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/banner/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'banner'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
    $sql1 = "update banner set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}

	if($res){
		header('location: home.php?&success');
	}else{
		header('location: home.php?error');
	}

?>
