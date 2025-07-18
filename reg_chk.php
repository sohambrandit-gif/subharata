<?php include "global/function.php";?>
<?php 
unset($_SESSION['order_no']);
unset($_SESSION['coupon']);
unset($_SESSION['coupon_val']);
unset($_SESSION['tax']);
unset($_SESSION['t_cgst']);
unset($_SESSION['t_sgst']);
unset($_SESSION['t_igst']);
 $fname=mysqli_real_escape_string($conn,$_POST['fname']);
 $lname=mysqli_real_escape_string($conn,$_POST['lname']);
 $phone=mysqli_real_escape_string($conn,$_POST['phone']);
 $email=mysqli_real_escape_string($conn,$_POST['email']);
 $password=mysqli_real_escape_string($conn,$_POST['password']);

if($fname=="" || $lname=="" || $password=="")
{
redir('register.php?msg=Please enter the required information');
}
else
{
    
/*$sql="select * from `user` where `email`= '".$email."'";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res); */

 $sql1="select * from `user` where `phone`= '".$phone."'";
$res1=mysqli_query($conn,$sql1);
$count1=mysqli_num_rows($res1);

/*if($count>0)
{
redir('register.php?msg=Email Already Registered');
}
else */ 
if($count1>0)
{
redir('register.php?msg=Phone Already Registered');
}
else{
    //$password=md5($password);
      $time = date("Y-m-d h:i:sa");
     $sql="insert into user (fname,lname,email,phone,password,valid,timestamp) values('$fname','$lname','$email','$phone','$password','1','$time')";
    $res=mysqli_query($conn,$sql);
    if($res){
    $uid= lastId('user','sl_id');
    $_SESSION['login']=$uid;
    
    /*$body='<html>
    <head>
    <title>Welcome to '.$company.' – We’re Excited to Have You!</title>
    </head>
    <body>
    <p>Thank you for signing up with '.$company.'! We’re delighted to have you as part of our family. Get ready to explore a world of exquisite sarees, handpicked just for you.</p>
    
    <p>Explore Our Collection:   <a style="color:#00b9f5;font-size:14px;margin-top:10px;" href="'.$link.'" target="_blank">'.$link.'</a></p>
    
    <p>💖 Why Shop with Us?</p>
    <p>✔️ Handcrafted & Authentic Sarees</p>
    <p>✔️ Premium Quality & Unique Designs</p>
    <p>✔️ Hassle-Free Returns & Secure Payments</p>
    
    <p>If you have any questions, feel free to reach out to our support team. Happy shopping!</p>
    </body>
    </html>';
    $subject= 'Welcome to '.$comapny;
    $headers= "From: ".$company." <$my_email>\r\n";
    $headers.= "Reply-To: ".$company."  <$my_email>\r\n";
    $headers.= "X-Mailer: PHP/" . phpversion()."\r\n";
    $headers.= "MIME-Version: 1.0" . "\r\n";
    $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";*/
   // email($email,$fname,$subject,$body);
    
    
    
    	setcookie("user_phone", $phone, time()+(60*60*24*7));
      //  setcookie("user_email", $email, time()+(60*60*24*7));
        setcookie("user_password", $password, time()+(60*60*24*7));
        setcookie("user_remember", $remember, time()+(31536000));
    
    if($_SESSION['return_url']!=''){
    redir($_SESSION['return_url']);
    }
    else{
    redir('index.php');
    }
}
else
{
redir('registration.php?msg=Registration Failed');
}
}
}
?>