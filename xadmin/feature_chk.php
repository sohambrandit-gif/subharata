<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$page=$_GET['page'];
$image=$_POST['image'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$video=mysqli_real_escape_string($conn,$_POST['video']);
$topic1=mysqli_real_escape_string($conn,$_POST['topic1']);
$description1=mysqli_real_escape_string($conn,$_POST['description1']);
$topic2=mysqli_real_escape_string($conn,$_POST['topic2']);
$description2=mysqli_real_escape_string($conn,$_POST['description2']);
$topic3=mysqli_real_escape_string($conn,$_POST['topic3']);
$description3=mysqli_real_escape_string($conn,$_POST['description3']);

if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/other/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'about'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update feature set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
$sql1 = "update feature set topic1='$topic1',description1='$description1',topic2='$topic2',description2='$description2',topic3='$topic3',description3='$description3',title='$title',video='$video'  where sl_id='$sl_id'";
$res=mysqli_query($conn,$sql1);
if($res){
	header('location: home.php?success');
}else{
	header('location: home.php?error');
}
?>