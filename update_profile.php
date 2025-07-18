<?php include "global/function.php";?>
<?php if(!isset($_SESSION['login']) || $_SESSION['login']==''){
redir('index.php');
}else{
$uid=$_SESSION['login'];
}?>
<?php
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$state=mysqli_real_escape_string($conn,$_POST['state']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$landmark=mysqli_real_escape_string($conn,$_POST['landmark']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$zip=mysqli_real_escape_string($conn,$_POST['zip']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$cpassword =mysqli_real_escape_string($conn,$_POST['cpassword']);
$facebook_link =mysqli_real_escape_string($conn,$_POST['facebook_link']);
$instagram_link =mysqli_real_escape_string($conn,$_POST['instagram_link']);
$influencer =mysqli_real_escape_string($conn,$_POST['influencer']);
if( $fname=="" || $lname=="" || $email=="" || $phone=="")
{
redir("student-settings.php?msg=Please enter required information");
}
// else if( $password=="" || $cpassword=="" )
// {
// redir("student-settings.php?msg=Passwords donot match");
// }
else
{
 echo $sql="update `user` set fname='$fname',lname='$lname',email='$email' ,phone='$phone' ,state='$state',city='$city',landmark='$landmark' ,address='$address' ,zip='$zip' ,password='$password' where sl_id=$uid";
 
$res=mysqli_query($conn,$sql);
if($res){

// if ($_FILES['image']['name']!='') {
			
// 	$tempFile = $_FILES['image']['tmp_name'];          //3             
// 	$targetPath = 'uploads/profile/'; 
// 	$ext = end((explode(".", $_FILES['image']['name'])));
// 	$file_name = 'profile'.date('ymdhis').'.'.$ext;
// 	$targetFile = $targetPath.$file_name;  //5
// 	move_uploaded_file($tempFile, $targetFile); //6
// 	$image = $file_name;
				
// 	$sql1 = "update user set image='$image' where sl_id=$uid";
// 	$res=mysqli_query($conn,$sql1);
// }


redir('student-profile.php?msg=Profile Updated');
}
else
{
redir('student-settings.php?msg=Error');
}

}
?>
