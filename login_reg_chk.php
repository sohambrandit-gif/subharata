<?php include 'global/function.php';  ?>
<?php
$email = $_POST['email'];
 $sql="select * from `user` where `phone`= '".$email."'";
$res=mysqli_query($conn,$sql);
 $count=mysqli_num_rows($res);
if($count > 0)
{
     $row=mysqli_fetch_array($res);
    
     $_SESSION['login']=$row['sl_id'];
        
        if($_SESSION['return_url']!=''){
       redir($_SESSION['return_url']);
        }
        else{
        redir('index.php');
        }

}else{
    if(preg_match('/^[0-9]{10}+$/', $email)) {
        $time = date("Y-m-d h:i:sa");
         $sql="insert into user (fname,lname,email, phone,password,type,valid,timestamp) values('GUEST','','','$email','GUEST','Phone','1','$time')";
    $res=mysqli_query($conn,$sql);
    if($res){
        $uid= lastId('user','sl_id');
        $_SESSION['login']=$uid;
        	setcookie("user_phone", '', time()+(60*60*24*7));
           // setcookie("user_email", $email, time()+(60*60*24*7));
            setcookie("user_password", $password, time()+(60*60*24*7));
            setcookie("user_remember", $remember, time()+(31536000));
        
        if($_SESSION['return_url']!=''){
        redir($_SESSION['return_url']);
        }
        else{
        redir('index.php');
        }
    }
    
} else {
 redir('login.php?msg=Invalid Phone Number');
}
    
   
    }     
      
     
?>