<?php include "../global/function.php"; ?>
<?php
$sl_id=$_GET['id'];
$action=$_GET['action'];
if($sl_id!='' && $action=='Active'){
		$sql1 = "update user set valid=1 where sl_id='$sl_id'";
		$res=mysqli_query($conn,$sql1);
	}else if($sl_id!='' && $action=='Block'){
		$sql1 = "update user set valid=0 where sl_id='$sl_id'";
		$res=mysqli_query($conn,$sql1);
	}

else if($sl_id!='' && $action=='Verified'){
	$sql1 = "update user set influencer_verified=1  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
	

	if(member_details($sl_id,'referral_code') ==''){
	    $date = new DateTime('now'); $date->modify('+2 years'); $up_date =  $date->format('Y-m-d h:m:s');
    	$code= strtoupper(member_details($sl_id,'fname')).'00'.$sl_id;
    	
    	$sql1 = "insert into coupon (name,type,value,expire_date,caption,category) values('$code','Percentage','10','$up_date','Infuencer Coupon','Influencer')";
    	$res=mysqli_query($conn,$sql1);
    	
    	$sql1 = "update user set referral_code='$code' where sl_id='$sl_id'";
		$res=mysqli_query($conn,$sql1);
	}
	
}
else if($sl_id!='' && $action=='Unverified'){
	$sql1 = "update user set influencer_verified=0  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){	
		header('location: lead.php?success');
}else{
		header('location: lead.php?error');
}
?>