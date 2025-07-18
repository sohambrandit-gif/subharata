<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$ques=mysqli_real_escape_string($conn,$_POST['ques']);
$ans=mysqli_real_escape_string($conn,$_POST['ans']);
if($sl_id==''){
	$sql1 = "insert into faq (ques,ans) values('$ques','$ans')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "update faq set ques='$ques',ans = '$ans'   where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}

if($res){
	header('location: faq.php?success');
}else{
	header('location: faq.php?error');
}
?>