<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$page=$_GET['page'];
$image=$_POST['image'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$link=mysqli_real_escape_string($conn,$_POST['link']);

if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/other/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'about'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update about set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
$sql1 = "update about set title='$title',description='$description',link='$link'  where sl_id='$sl_id'";
$res=mysqli_query($conn,$sql1);
if($res){
	header('location: '.$page.'.php?success');
}else{
	header('location: '.$page.'.php?error');
}
?>
