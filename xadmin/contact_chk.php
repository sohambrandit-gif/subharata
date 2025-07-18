<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$office1=mysqli_real_escape_string($conn,$_POST['office1']);
$office2=mysqli_real_escape_string($conn,$_POST['office2']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$youtube=mysqli_real_escape_string($conn,$_POST['youtube']);
$whatsapp=mysqli_real_escape_string($conn,$_POST['whatsapp']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$contact_email=mysqli_real_escape_string($conn,$_POST['contact_email']);
$fb=mysqli_real_escape_string($conn,$_POST['fb']);
$tw=mysqli_real_escape_string($conn,$_POST['tw']);
$insta=mysqli_real_escape_string($conn,$_POST['insta']);
$linkedin=mysqli_real_escape_string($conn,$_POST['linkedin']);
$footer_text=mysqli_real_escape_string($conn,$_POST['footer_text']);

 $sql1 = "update contact set office1='$office1',office2='$office2',phone='$phone',whatsapp='$whatsapp',email='$email',contact_email='$contact_email',fb='$fb',tw='$tw',insta='$insta',linkedin='$linkedin',footer_text='$footer_text',youtube='$youtube'  where sl_id='$sl_id'";
 $res=mysqli_query($conn,$sql1);
if($res){
	header('location: contact.php?success');
}else{
	header('location: contact.php?error');
}
?>