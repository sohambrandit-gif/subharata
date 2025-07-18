<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$c1=mysqli_real_escape_string($conn,$_POST['c1']);
$text1=mysqli_real_escape_string($conn,$_POST['text1']);
$c2=mysqli_real_escape_string($conn,$_POST['c2']);
$text2=mysqli_real_escape_string($conn,$_POST['text2']);
$c3=mysqli_real_escape_string($conn,$_POST['c3']);
$text3=mysqli_real_escape_string($conn,$_POST['text3']);

$sql1 = "update counter set c1='$c1',text1='$text1',c2='$c2',text2='$text2',c3='$c3',text3='$text3'  where sl_id='$sl_id'";
$res=mysqli_query($conn,$sql1);
if($res){
	header('location: home.php?success');
}else{
	header('location: home.php?error');
}
?>