<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$page=$_GET['page'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$change_text=mysqli_real_escape_string($conn,$_POST['change_text']);
$seo_tags=mysqli_real_escape_string($conn,$_POST['seo_tags']);

$sql1 = "update slider_text set title='$title',change_text='$change_text',description='$description'  where sl_id='$sl_id'";
$res=mysqli_query($conn,$sql1);
if($res){
		header('location: '.$page.'.php?success');
}else{
		header('location: '.$page.'.php?error');
}
?>
