<?php include "global/function.php";?>
<?php 
unset($_SESSION['order_no']);
unset($_SESSION['coupon']);
unset($_SESSION['coupon_val']);
unset($_SESSION['tax']);
unset($_SESSION['t_cgst']);
unset($_SESSION['t_sgst']);
unset($_SESSION['t_igst']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$remember = isset($_POST['remember']) ? '1' : '0';  // 1 if checked, 0 if unchecked
if($email=="" || $password=="")
{
redir('login.php?msg=Please enter the required information');
}
else
{
    //$password=md5($password);
    $sql="select * from `user` where (phone='$email' or email='$email') and password='$password' and valid=1";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    $count=mysqli_num_rows($res);
    if($count > 0)
    {
        $_SESSION['login']=$row['sl_id'];
        $_SESSION['student']=$row['student'];
        if (isset($_POST['remember']) && $_POST['remember'] == '1') {
            /*
             * Set Cookie from here for one hour
             * */
        	setcookie("user_phone", $phone, time()+(60*60*24*7));
          setcookie("user_email", $email, time()+(60*60*24*7));
        	setcookie("user_password", $password, time()+(60*60*24*7));
        	setcookie("user_remember", $remember, time()+(31536000));
        
        
          } else {
            /**
             * Following code will unset the cookie
             * it set cookie 1 sec back to current Unix time
             * so that it will invalid
             * */
             setcookie("user_email", $email, time()-1);
            setcookie("user_phone", $phone, time()-1);
        	setcookie("user_password", $password, time()-1);
        	setcookie("user_remember", $remember, time()-1);
        
          }
        if($_SESSION['return_url']!=''){
       redir($_SESSION['return_url']);
        }
        else{
        redir('index.php');
        }
    }
    else
    {
        
         redir('login.php?msg=Login Error');
           

    }
}
?>
