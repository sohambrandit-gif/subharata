<?php  include 'connection.php'; ?>
<?php  include 'smtp_email.php';
  include "gc_config.php";
?>
<?php 
function isMobileDevice() { 
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
, $_SERVER["HTTP_USER_AGENT"]); 
} 
?> 

<?php
function days_units($val1,$val2){
		    $date1 = new DateTime($val1);
			$date2 = new DateTime($val2);
			$diff = $date1->diff($date2);
			if($diff->y >0)
				return "Year";
			else if($diff->m >0)
				return "Month";
			else if($diff->d >0)
				return "Day";
				
}
function check_axis_values($val1,$val2){
$x=days_units($val1,$val2);
$k=array();
if($x=='Year'){
	$k=GetYear($val1, $val2); 
}
else if($x=='Month'){
	$k=GetMonth($val1, $val2); 
}
else if($x=='Day'){
	$k=GetDays($val1, $val2); 
}
return $k;
}
function GetDays($sStartDate, $sEndDate){  
      // Firstly, format the provided dates.  
      // This function works best with YYYY-MM-DD  
      // but other date formats will work thanks  
      // to strtotime().  
      $sStartDate = gmdate("Y-m-d", strtotime($sStartDate));  
      $sEndDate = gmdate("Y-m-d", strtotime($sEndDate));  

      // Start the variable off with the start date  
     $aDays[] = gmdate("d", strtotime($sStartDate));  

     // Set a 'temp' variable, sCurrentDate, with  
     // the start date - before beginning the loop  
     $sCurrentDate = $sStartDate;  

     // While the current date is less than the end date  
     while($sCurrentDate < $sEndDate){  
       // Add a day to the current date  
       $sCurrentDate = gmdate("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));  

       // Add this new day to the aDays array  
       $aDays[] = gmdate("d", strtotime($sCurrentDate));  
     }  

     // Once the loop has finished, return the  
     // array of days.  
     return $aDays;  
   }  


function GetYear($sStartDate, $sEndDate){ 
$start    = $sStartDate;
$end      = $sEndDate;
$getRangeYear   = range(gmdate('Y', strtotime($start)), gmdate('Y', strtotime($end)));
return $getRangeYear ;
}


function GetMonth($sStartDate, $sEndDate){ 
$startDate = new DateTime($sStartDate);
$endDate = new DateTime($sEndDate);

$dateInterval = new DateInterval('P1M');
$datePeriod   = new DatePeriod($startDate, $dateInterval, $endDate);
$mon=array();
foreach ($datePeriod as $date) {
    array_push($mon,$date->format('m'));
}
return $mon;
}
?>
<?php 
date_default_timezone_set("America/New_York");
$today=date('y-m-d'); ?>
<?php
 if (isset($_COOKIE['username'])) {
    $_SESSION['login'] = $_COOKIE['username'];
	 $sql="update `members` set timezone='".$_SESSION['timezone']."', last_visit='$today' where memb_id=".$_SESSION['login'];
$res=mysqli_query($conn,$sql);
  }
?>
<?php 
function save_image($inPath,$outPath)
{ 
$in=    fopen($inPath, "rb");
$out=   fopen($outPath, "wb");
while ($chunk = fread($in,8192))
{
fwrite($out, $chunk, 8192);
}
fclose($in);
fclose($out);
}
?>
<?php
function url_to_link($text) {
$content = preg_replace('$(\s|^)(https?://[a-z0-9_./?=&-]+)(?![^<>]*>)$i', ' <a href="$2" target="_blank" rel="nofollow">$2</a> ', $text." ");
$content = preg_replace('$(\s|^)(www\.[a-z0-9_./?=&-]+)(?![^<>]*>)$i', '<a target="_blank" href="http://$2"  target="_blank" rel="nofollow">$2</a> ', $content." ");
return $content;
}
?>
<?php function zone_to_sec($zone){
$time=explode(':',$zone);
$hr=str_replace("-","",$time[0]);
$sec=$hr*3600;
$min=$time[1];
$sec1=$min*60;
$t_sec=$sec+$sec1+$time[2];
return $t_sec;
}
?>
<?php 
function time_difference() 
{ 
$time1 = strtotime(gmdate("Y-m-d H:i:s")); 
$time2 = strtotime($_SESSION['time_client']); 
if ($time2 < $time1) 
{ 
return $time1-$time2;
} 
else{
return ($time2 - $time1) ; 
} 
} ?>
<?php 
function get_time_difference($time1, $time2) 
{ 
//echo $time1." ".$time2;
$time1 = strtotime("1/1/1980 $time1"); 
$time2 = strtotime("1/1/1980 $time2"); 

if ($time2 < $time1) 
{ 
return "Few secs ago";
} 
else{
 $time=($time2 - $time1) ; 
if($time>3600){
$hours = floor($time / 3600);
$minutes = floor(($time / 60) % 60)." min";
$seconds = $time % 60 ."sec";
if($hours==1){
$k = $hours ." hr ago";
} 
else 
{
$k = $hours ." hrs ago";
}
}
else if($time>60){
 $minutes = floor(($time / 60) % 60);
$seconds = $time % 60 ." sec";
if($minutes==1){
$k = $minutes ." min ago";
} 
else 
{
 $k = $minutes ." mins ago";
}
}
else {
if($time <10) {
$k= "Few secs ago";
}
else{
$k= $time ." secs ago";
}
}
} 
return $k;
} ?>
<?php function time_breakup($time){
if($time>3600){
$hours = floor($time / 3600);
$minutes = floor(($time / 60) % 60)." min";
$seconds = $time % 60 ."sec";
if($hours==1){
$k = $hours ." hr";
} 
else 
{
$k = $hours ." hrs";
}
}
else if($time>60){
 $minutes = floor(($time / 60) % 60);
$seconds = $time % 60 ." sec";
if($minutes==1){
$k = $minutes ." min";
} 
else 
{
 $k = $minutes ." mins";
}
}
else {
if($time <10) {
$k= "Few secs";
}
else{
$k= $time ." secs";
}
}
return $k;
}?>
<?php  
function cart_ship(){
global $conn;
$ship=true;
$manufacture_id='';
$sql="select * from cart where memb_id='".$_SESSION['login']."'";
$res=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_array($res)){
     echo get_prod($row['prod_id'],'manufacture_id');
            if(get_prod($row['prod_id'],'manufacture_id') != $manufacture_id &&  $manufacture_id!='' ){
               $ship = false;
               break;
            }else{
                $manufacture_id = get_prod($row['prod_id'],'manufacture_id'); 

            }
    } 
   
    return $ship;
}
?>

<?php  
function order_subtotal(){
global $conn;
$s=0;
unset($_SESSION['free_arr']);
unset($_SESSION['has_offer']);
$sql="select * from cart where memb_id='".$_SESSION['login']."' && offer !='Buy 2 Get 1' && offer !='Buy 2 Combo'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
   
         $s+=$row['qty']*get_prod($row['prod_id'],'price');
    
}
$sql="select * from cart where memb_id='".$_SESSION['login']."' && offer ='Buy 2 Get 1'";
$res=mysqli_query($conn,$sql);
$arr_price =[];
$arr_prod =[];
$offer_buy2 = 0;
$offer_buy2_min = 0;
$offer_buy2_total = 0;

while($row=mysqli_fetch_array($res)){
   
    $price = get_prod($row['prod_id'],'price');
    $offer_buy2 += $row['qty'];
    $offer_buy2_total += $row['qty']*$price;
    
    for($i = 1 ; $i<= $row['qty']; $i++){
        array_push($arr_price,$price);
        array_push($arr_prod,$row['code']);
    }

}

sort($arr_price);
$buy2_repeat = floor($offer_buy2 / 3);

$_SESSION['free_arr'] = [];
$i = 0;
for($i= 0; $i < $buy2_repeat ; $i++){
    $offer_buy2_total = $offer_buy2_total - $arr_price[$i];
    array_push($_SESSION['free_arr'],$arr_prod[$i]);
     $_SESSION['has_offer'] = 1;
}

    $s = $s + $offer_buy2_total;
    
    
    
$sql="select * from cart where memb_id='".$_SESSION['login']."' && offer ='Buy 2 Combo'";
$res=mysqli_query($conn,$sql);
$arr_combo_price =[];
$offer_buy2_combo = 0;
$offer_buy2_combo_total = 0;

while($row=mysqli_fetch_array($res)){
    $_SESSION['has_offer'] = 1;
    $price = get_prod($row['prod_id'],'price');
    $offer_buy2_combo += $row['qty'];
  
    
     for($i = 1 ; $i<= $row['qty']; $i++){
        array_push($arr_combo_price,$price);
     }
    
}


$buy2_repeat = floor($offer_buy2_combo / 2);
$buy2_combo_rem = $offer_buy2_combo % 2;

$offer_buy2_combo_total += $buy2_repeat * 1500;
if($buy2_combo_rem > 0){
    $offer_buy2_combo_total += end($arr_combo_price);
     $_SESSION['has_offer'] = 1;
}

    $s = $s + $offer_buy2_combo_total;
    
    
	return $s;
}
?>
<?php  
function coupon_val(){
global $conn;
$now=date('Y-m-d');
$sql="select * from coupon where name='".$_SESSION['coupon']."' and expire_date>='$now' and valid=1";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
if($row['type'] =='Fixed'){
	$_SESSION['coupon_val']=$row['value'];
}else{
	$_SESSION['coupon_val']=order_subtotal()*($row['value']/100);
}
return $_SESSION['coupon_val'];
}
?>
<?php  
function order_total(){
global $conn;
$s=order_subtotal();

if($_SESSION['coupon']!=''){ 
	 $s=$s-coupon_val();
}
if($_SESSION['tax']!=''){ 
	 $s=$s+$_SESSION['tax'];
}
	return $s;
}
?>
<?php	
function timezone($zone){
switch($zone){
case "-12.0":
echo "(GMT -12:00) Eniwetok, Kwajalein ";break;
case "-11.0":
echo "(GMT -11:00) Midway Island, Samoa ";break;
case "-10.0":
echo "(GMT -10:00) Hawaii ";break;
case "-9.0":
echo "(GMT -9:00) Alaska ";break;
case "-8.0":
echo "(GMT -8:00) Pacific Time (US &amp; Canada) ";break;
case "-7.0":
echo "(GMT -7:00) Mountain Time (US &amp; Canada) ";break;
case "-6.0":
echo "(GMT -6:00) Central Time (US &amp; Canada), Mexico City ";break;
case "-5.0":
echo "(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima ";break;
case "-4.0":
echo "(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz ";break;
case "-3.5":
echo "(GMT -3:30) Newfoundland ";break;
case "-3.0":
echo "(GMT -3:00) Brazil, Buenos Aires, Georgetown ";break;
case "-2.0":
echo "(GMT -2:00) Mid-Atlantic ";break;
case "-1.0":
echo "(GMT -1:00 hour) Azores, Cape Verde Islands ";break;
case "0.0":
echo "(GMT) Western Europe Time, London, Lisbon, Casablanca ";break;
case "1.0":
echo "(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris ";break;
case "2.0":
echo "(GMT +2:00) Kaliningrad, South Africa ";break;
case "3.0":
echo "(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg ";break;
case "3.5":
echo "(GMT +3:30) Tehran ";break;
case "4.0":
echo "(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi ";break;
case "4.5":
echo "(GMT +4:30) Kabul ";break;
case "5.0":
echo "(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent ";break;
case "5.5":
echo "(GMT +5:30) Bombay, Calcutta, Madras, New Delhi ";break;
case "5.75":
echo "(GMT +5:45) Kathmandu ";break;
case "6.0":
echo "(GMT +6:00) Almaty, Dhaka, Colombo ";break;
case "7.0":
echo "(GMT +7:00) Bangkok, Hanoi, Jakarta ";break;
case "8.0":
echo "(GMT +8:00) Beijing, Perth, Singapore, Hong Kong ";break;
case "9.0":
echo "(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk ";break;
case "9.5":
echo "(GMT +9:30) Adelaide, Darwin ";break;
case "10.0":
echo "(GMT +10:00) Eastern Australia, Guam, Vladivostok ";break;
case "11.0":
echo "(GMT +11:00) Magadan, Solomon Islands, New Caledonia ";break;
case "12.0":
echo "(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka ";break;
}
}
?>
<?php 
function days_diff($datetime1,$datetime2){
$datetime1 = new DateTime($datetime1);
$datetime2 = new DateTime($datetime2);
$difference = $datetime1->diff($datetime2);
return $difference->days;
}
?>
<?php
function redir($url) // Redirects to a different page eg:redir('index.php?code=20')
{
?>
<script type="text/javascript">
window.location = "<?php echo $url ?>"
</script>
<?php
}
?>
<?php
function get_manufacture($manu_id){
global $conn;
$qry=mysqli_query($conn,"SELECT * FROM `manufacture` WHERE `sl_id`='".$manu_id."'");
$row=@mysqli_fetch_array($qry);
$content=$row['ship_rocket'];
return $content;
}
?>
<?php
function get_cat($cat){
global $conn;
$qry=mysqli_query($conn,"SELECT * FROM `category` WHERE `sl_id`='".$cat."'");
$row=@mysqli_fetch_array($qry);
$content=$row['name'];
return $content;
}
?>
<?php
function get_event($sl_id ){
global $conn;
$qry=mysqli_query($conn,"SELECT * FROM `events` WHERE `sl_id`='".$sl_id."'");
$row=@mysqli_fetch_array($qry);
$content=$row['title'];
return $content;
}
?>
<?php
function get_prod($id,$col){
global $conn;
$qry=mysqli_query($conn,"SELECT * FROM `product` WHERE `sl_id`='".$id."'");
$row=@mysqli_fetch_array($qry);
$content=$row[$col];
return $content;
}
?>
<?php
function show_cont1($page,$title){
$qry=mysqli_query($conn,"SELECT * FROM `content` WHERE `page`='".$page."' AND `title`='".$title."' AND `valid`=1");
$row=@mysqli_fetch_array($qry);
$content=$row['name'];
return $content;
}
?>
<?php
function msg_info($sender_id,$feild){

$qry=mysqli_query($conn,"select * from notifications where memb_id='".$_SESSION['login']."' and sender_id='$sender_id'  and ( topic='msg' or topic='reply') order by noti_id desc limit 1");
$row=@mysqli_fetch_array($qry);
$content=$row[$feild];
return $content;
}
?>
<?php
function total_cat_prod($cat_id){
global $conn;
$qry=mysqli_query($conn,"select count(*) as c from product where cat_id='".$cat_id."'");
$row=@mysqli_fetch_array($qry);
$content=$row['c'];
return $content;
}
?>
<?php
function total_prod_review($prod_id){
global $conn;
$qry=mysqli_query($conn,"select count(*) as c from product_review where prod_id='".$prod_id."'");
$row=@mysqli_fetch_array($qry);
$content=$row['c'];
return $content;
}
?>
<?php
function total_prod_review_avg($prod_id){
global $conn;
$qry=mysqli_query($conn,"select avg(rating) as c from product_review where prod_id='".$prod_id."'");
$row=@mysqli_fetch_array($qry);
$content=round($row['c']);
return $content;
}
?>
<?php
function total_prod_review_count($prod_id,$rcount){
global $conn;
$qry=mysqli_query($conn,"select count(*) as c from product_review where prod_id='".$prod_id."' and rating =".$rcount);
$row=@mysqli_fetch_array($qry);
$content=$row['c'];
return $content;
}
?>
<?php
function total_prod_people_review_count($prod_id){
global $conn;
$qry=mysqli_query($conn,"select count(*) as c from product_review where prod_id='".$prod_id."'");
$row=@mysqli_fetch_array($qry);
$content=$row['c'];
return $content;
}
?>
<?php
function total_prod_review_percentage($prod_id,$rcount){
global $conn;
$qry=mysqli_query($conn,"select count(*) as c from product_review where prod_id='".$prod_id."'");
$row=@mysqli_fetch_array($qry);
$t_review=$row['c'];
$sec_review = total_prod_review_count($prod_id,$rcount);
if($t_review != 0){
$data = ($sec_review / $t_review) * 100;
}else{
$data = 0;
}
if($sec_review == 0){
    return 0;
}else{
    return $data;
}
return 5;
}
?>
<?php
function total_item_cart(){
global $conn;
  $q=0;
  $sql="select * from cart where memb_id='".$_SESSION['login']."'";
  $res=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($res)){
     $q+= $row['qty'];
  }
return $q;
}
?>
<?php
function cart_item_chk($prod_id,$code=0){
global $conn;
$qry=mysqli_query($conn,"select count(*) as c from cart where memb_id='".$_SESSION['login']."' and prod_id='$prod_id' and code='$code'");
$row=@mysqli_fetch_array($qry);
$content=$row['c'];
return $content;
}
?>
<?php
function wishlist_item_chk($prod_id){
global $conn;
$qry=mysqli_query($conn,"select count(*) as c from wishlist where memb_id='".$_SESSION['login']."' and prod_id='$prod_id' ");
$row=@mysqli_fetch_array($qry);
$content=$row['c'];
return $content;
}
?>
<?php
function cart_get_data($prod_id,$code,$col){
global $conn;
$qry=mysqli_query($conn,"select *  from cart where memb_id='".$_SESSION['login']."' and prod_id='$prod_id' and code='$code'");
$row=@mysqli_fetch_array($qry);
$content=$row[$col];
return $content;
}
?>
<?php 
function admin_details($admin_id,$field){
$qry=mysqli_query($conn,"select * from admin  WHERE admin.id='".$admin_id."' ");
$row=@mysqli_fetch_array($qry);
if($field=='image'){
$a=$row[$field];
}
else{
$a= stripslashes ($row[$field]);
}
return $a;
}
?>
<?php
function insert_content($page,$title,$desc){
$qry=mysqli_query($conn,"insert into content values(NULL,'$page','$title','$desc',1)");
}
?>
<?php
function member_details($memb_id,$field){
global $conn;
//echo "select * from `user`  WHERE `sl_id`='".$memb_id."' ";
$qry=mysqli_query($conn,"select * from `user`  WHERE `sl_id`='".$memb_id."' ");
$row=@mysqli_fetch_array($qry);
if($field=='profile_image'){
$a=$row[$field];
}
else{
$a= stripslashes ($row[$field]);
}
return $a;
}
?>
<?php
function order_details($post_id,$field){
//echo "select * from `order`  WHERE `order_id`='".$post_id."' ";
$qry=mysqli_query($conn,"select * from `order`  WHERE `order_id`='".$post_id."' ");
$row=@mysqli_fetch_array($qry);

$a= stripslashes ($row[$field]);

return $a;
}
?>
<?php
function pdf_order_details($post_id,$field){
//echo "select * from `order`  WHERE `order_id`='".$post_id."' ";
$qry=mysqli_query($conn,"select * from `pdf_order`  WHERE `order_id`='".$post_id."' ");
$row=@mysqli_fetch_array($qry);

$a= stripslashes ($row[$field]);

return $a;
}
?>
<?php
function coupon_details($post_id,$field){
//echo "select * from `coupons`  WHERE `coupons_id`='".$post_id."' ";
$qry=mysqli_query($conn,"select * from `coupon`  WHERE `sl_id`='".$post_id."' ");
$row=@mysqli_fetch_array($qry);
$a= stripslashes ($row[$field]);
return $a;
}
?>
<?php
function testi_details($post_id,$field){
//echo "select * from `coupons`  WHERE `coupons_id`='".$post_id."' ";
$qry=mysqli_query($conn,"select * from `comment`  WHERE `comment_id`='".$post_id."' ");
$row=@mysqli_fetch_array($qry);
$a= stripslashes ($row[$field]);
return $a;
}
?>
<?php
function seo_details($parmalink,$field){
//echo "select * from `seo` WHERE `permalink` like '%".$parmalink."%'";
$qry=mysqli_query($conn,"select * from `seo` WHERE `permalink` like '%".$parmalink."%'");
$row=@mysqli_fetch_array($qry);

if($parmalink=='testimonials.php'){
$a='Testimonials - MUT Coin Warehouse';
}
else{
$a= stripslashes ($row[$field]);

}
return $a;
}
?>
<?php
function blog_details($post_id,$field){
//echo "select * from `blog`  WHERE `post_id`='".$post_id."' ";
$qry=mysqli_query($conn,"select * from `blog`  WHERE `post_id`='".$post_id."' ");
$row=@mysqli_fetch_array($qry);
if($field=='img'){
$a=$row[$field];
}
else{
$a= stripslashes ($row[$field]);
}

return $a;
}
?>
<?php
function pdf_details($post_id,$field){
//echo "select * from `blog`  WHERE `post_id`='".$post_id."' ";
$qry=mysqli_query($conn,"select * from `pdf`  WHERE `pdf_id`='".$post_id."' ");
$row=@mysqli_fetch_array($qry);
if($field=='img'){
$a=$row[$field];
}
else{
$a= stripslashes ($row[$field]);
}

return $a;
}
?>
<?php
function email_details($email_id,$field){
//echo "select * from `members`  WHERE members.`memb_id`='".$memb_id."' ";
$qry=mysqli_query($conn,"select * from `emails`  WHERE `email_id`='".$email_id."' ");
$row=@mysqli_fetch_array($qry);
$a= stripslashes ($row[$field]);
return $a;
}
?>
<?php
function cont_details($cont_id,$field){
//echo "select * from `events` WHERE  event_id='".$evnt_id."'";
$qry=mysqli_query($conn,"select * from `contact` WHERE  cont_id='".$cont_id."'");
$row=@mysqli_fetch_array($qry);
$a= stripslashes ($row[$field]);
return $a;
}
?>
<?php
function type_details($post_id,$field){
//echo "select * from `blog`  WHERE `post_id_id`='".$post_id."' ";
$qry=mysqli_query($conn,"select * from `type`  WHERE `type_id`='".$post_id."' ");
$row=mysqli_fetch_array($qry);
$a= stripslashes ($row[$field]);

return $a;
}
?>
<?php
function sub_type_details($email_id,$field){
//echo "select * from `members`  WHERE members.`memb_id`='".$memb_id."' ";
$qry=mysqli_query($conn,"select * from `sub_type`  WHERE `sub_type_id`='".$email_id."' ");
$row=mysqli_fetch_array($qry);
$a= stripslashes ($row[$field]);
return $a;
}
?>
<?php
function platform_details($s_id,$feild){
//echo "select * from `platform_pricing` WHERE  platform_id='".$s_id."'";
$qry=mysqli_query($conn,"select * from `platform_pricing` WHERE  platform_id='".$s_id."'");
$row=mysqli_fetch_array($qry);
$a= stripslashes($row[$feild]);
return $a;
}
?>
<?php
function package_details($s_id,$feild){
//echo "select * from `platform_pricing` WHERE  platform_id='".$s_id."'";
$qry=mysqli_query($conn,"select * from `platform_packages` WHERE  platform_id='".$s_id."'");
$row=mysqli_fetch_array($qry);
$a= stripslashes($row[$feild]);
return $a;
}
?>
<?php
function state($state){
$qry=mysqli_query($conn,"select * from `states` WHERE  state_short='".$state."'");
$row=@mysqli_fetch_array($qry);
$a= stripslashes ($row['state_long']);
return $a;
}
?>
<?php 
function pdf_upload($fild_name,$path)
{	
$fild=$fild_name;
$file = $_FILES [$fild];
$kaboom = explode(".", $file['name']);
$fileExt = end($kaboom);
$name=date("YmdHis").'-agent'.'.'.$fileExt;
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name'];
if ($type == "application/pdf" )
{
if(move_uploaded_file ($tmppath, $path.'/'.$name))
{return $name;}
}
}
?>
<?php 
function file_upload($fild_name,$path)
{	
$fild=$fild_name;
$file = $_FILES [$fild];
$kaboom = explode(".", $file['name']);
$fileExt = end($kaboom);
$name=date("YmdHis").'-agent'.'.'.$fileExt;
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name'];

if(move_uploaded_file ($tmppath, $path.'/'.$file['name']))
{return $file['name'];}

}
?>
<?php 
function pic_upload($fild_name,$path)
{	
$fild=$fild_name;
$file = $_FILES [$fild];
$kaboom = explode(".", $file['name']);
$fileExt = end($kaboom);
$name=date("YmdHis").'-agent'.'.'.$fileExt;
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name'];
if (($type == "image/gif") || ($type == "image/jpg") || ($type == "image/jpeg") || ($type == "image/png") || ($type == "image/pjpeg"))
{
if(move_uploaded_file ($tmppath, $path.'/'.$name))
{return $name;}
}
}
?>
<?php
function pic_upload_prop($fild_name,$path,$w,$fold)
{	
$fild=$fild_name;
$file = $_FILES [$fild];
$kaboom = explode(".", $file['name']);
$fileExt = end($kaboom);
$name=date("YmdHis").'-agent'.'.'.$fileExt;
$name1 =$file['name'];
$name1 =date("YmdHis").'.'.$fileExt;
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name'];
if (($type == "image/gif") || ($type == "image/jpg") || ($type == "image/jpeg") || ($type == "image/png") || ($type == "image/pjpeg"))
{
if(move_uploaded_file ($tmppath, $path.'/'.$name))
{
$target_file = $path.'/'.$name;
$resized_file = $path.'/'.$name1;
$wmax = $w;
@ak_img_resize($name,$path,$w,$fold);
return $name;
}
}
}
function ak_img_resize($thumbName,$path,$w,$fold) {
$size= list($width, $height, $type, $attr) = getimagesize($path."/".$thumbName); 
$width;
if($width >= $w){
$file = $thumbName; 
$save = $thumbName; 
$t_w =$w;
$t_h = ($width / $height)*$t_w; 
$o_path = $path."/";
$s_path = $fold;	
Resize_Image($save,$file,$t_w,$t_h,$s_path,$o_path);		
}
else
{
$file = $thumbName; 
$save = $thumbName;
$o_path = $path."/";

$s_path = $fold;	

$s_path = trim($s_path);
$o_path = trim($o_path);
$save = $s_path . $save;
$file = $o_path . $file;
$ext = strtolower(end(explode('.',$save)));
$tn = imagecreatetruecolor($width, $height) ; 
switch ($ext) {
case 'jpg':
case 'jpeg':
$image = imagecreatefromjpeg($file) ; 
break;
case 'gif':
$image = imagecreatefromgif($file) ; 
break;
case 'png':
$image = imagecreatefrompng($file) ; 
break;
}
imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ; 
imagejpeg($tn, $save, 100); 
}
}
function Resize_Image($save,$file,$t_w,$t_h,$s_path,$o_path) {
$s_path = trim($s_path);
$o_path = trim($o_path);
$save = $s_path . $save;
$file = $o_path . $file;
$ext = strtolower(end(explode('.',$save)));
list($width, $height) = getimagesize($file) ; 
if(($width>$t_w) OR ($height>$t_h)) {
$r1 = $t_w/$width;
$r2 = $t_h/$height;
if($r1<$r2) {
$size = $t_w/$width;
}else{
$size = $t_h/$height;
}
}else{
$size=1;
}
$modwidth = $width * $size; 
$modheight = $height * $size; 
$tn = imagecreatetruecolor($modwidth, $modheight) ; 
switch ($ext) {
case 'jpg':
case 'jpeg':
$image = imagecreatefromjpeg($file) ; 
break;
case 'gif':
$image = imagecreatefromgif($file) ; 
break;
case 'png':
$image = imagecreatefrompng($file) ; 
break;
}
imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ; 
imagejpeg($tn, $save, 100); 
return ;
}
?>
<?php
function lastId($table,$id){
global $conn;
//echo "SELECT * FROM `$table` ORDER BY $id DESC LIMIT 1";
$query=mysqli_query($conn,"SELECT * FROM `$table` ORDER BY $id DESC LIMIT 1");
$row=@mysqli_fetch_array($query);
return $row[$id];
}
?>
<?php
function showStatus($id,$table){
$query=mysqli_query($conn,"SELECT * FROM `$table` WHERE `id`='$id'");
$row=@mysqli_fetch_array($query);
$msg='';
if($row['valid']==1){
return $msg='Active';
}
if($row['valid']==0){
return	$msg='Deactivated';
}
}
?>
<?php
function to_title_case( $string ) {
     /* Words that should be entirely lower-case */
     $articles_conjunctions_prepositions = array(
          'a','an','the',
          'and','but','or','nor',
          'if','then','else','when',
          'at','by','from','for','in',
          'off','on','out','over','to','into','with'
     );
     /* Words that should be entirely upper-case (need to be lower-case in this list!) */
     $acronyms_and_such = array(
         'asap', 'unhcr', 'wpse', 'wtf'
     );
     /* split title string into array of words */
     $words = explode( ' ', mb_strtolower( $string ) );
     /* iterate over words */
     foreach ( $words as $position => $word ) {
         /* re-capitalize acronyms */
         if( in_array( $word, $acronyms_and_such ) ) {
             $words[$position] = mb_strtoupper( $word );
         /* capitalize first letter of all other words, if... */
         } elseif (
             /* ...first word of the title string... */
             0 === $position ||
             /* ...or not in above lower-case list*/
             ! in_array( $word, $articles_conjunctions_prepositions ) 
         ) {
             $words[$position] = ucwords( $word );
         }
     }         
     /* re-combine word array */
     $string = implode( ' ', $words );
     /* return title string in title case */
     return $string;
} 
function error_code()
{
global $code;
if (isset($code))
{
switch ($code)
{
case "11":
$a= "Member not registered";
break;
case "12":
$a= "Please type in the required info";
break;
case "13":
$a= "Password missmatch. Please try again";
break;
case "14":
$a= "Please Enter a password for your new account";
break;
case "15":
$a= "Email already registered";
break;
case "16":
$a= "Invalid email or password ";
break;
case "17":
$a= "Email address not registered";
break;
case "18":
$a= "Successfully uploaded";
break;
case "19":
$a= "Not successfully uploaded";
break;
case "20":
$a= "Not successful";
break;
case "21":
$a= "Successful";
break;
case "22":
$a= "Successfully logged in";
break;
case "23":
$a= "Login Failure. Please try again";
break;
case "24":
$a= "Message sucessfully Sent";
break;
case "25":
$a= "Sendind failure. Please try again";
break;
case "26":
$a= "Email does not exist with us";
break;
case "27":
$a= "This email address is associated with a Facebook or Google login.<br/> <br/>Please login with Facebook or Google, or register with an alternative email address.";
break;
case "28":
$a= "You have entered a wrong code";
break;
case "29":
$a= "This Email is already registered with us";
break;
case "30":
$a= "Password and Confirm password mismatched";
break;
case "31":
$a= 'Registration Failed! Please try again';
break;
case "32":
$a= 'Password changed Successfully';
break;
case "33":
$a= 'Thanks for contacting us. We will get back to you soon';
break;
case "36":
$a= 'Changes successful';
break;
case "37":
$a= 'Deleted successfully';
break;
case "38":
$a= 'Failed! try again';
break;
case "39":
$a= 'Request sending failed. Try again';
break;
case "40":
$a= 'Type the correct password, then type your new password and confirm password';
break;
case "41":
$a= 'Please enter the captcha correctly';
break;
case "42":
$a= 'Your account has been blocked by the admin';
break;
case "43":
$a= 'Please Check Your Mailbox to Verify The Email Address';
break;
case "44":
$a= 'Country is required';
break;
default:
$a= "Error";
}

echo to_title_case($a);
}
}
?>
<?php
function adddays($date,$days){
$date = strtotime("+".$days." days", strtotime($date));
return  date("m/d/Y", $date);
}
?>
<?php
function InsertData($TblName,$Fields,$Values)
{
global $conn;
  $query="INSERT INTO `{$TblName}` (`".(is_array($Fields)?implode("`,`",$Fields):$Fields)."`) VALUES (".(is_array($Values)?"'".implode("','",$Values)."'":$Values).")";
return mysqli_query($conn,$query);
}
?>
<?php
function date_arr($date){
if($date!=''){
$d=explode("-",$date);
return $date=$d[1]."/".$d[2]."/".$d[0];
}
else{
return '';
}
}
?>
<?php
function date_unarr($date){
if($date!=''){
$d=explode("/",$date);
return $date=$d[2]."-".$d[0]."-".$d[1];
}
else{
return '';
}
}
?>
<?php
function normal_time($army_time_str){
$regular_time_str = date( 'g:i A', strtotime( $army_time_str ) );
return $regular_time_str;
}
?>
<?php function acc_settings($uid,$field){
 $query=mysqli_query($conn,"SELECT * FROM `acc_set` where uid=".$uid);
$row=@mysqli_fetch_array($query);
 $a= stripslashes ($row[$field]);
return $a;
}
?>
<?php
function max_count($number){
$big=0;
foreach($number  as $num){
 if($big<$num)
      $big=$num;
  }
  


  return $big;
}
function closetags($html) {
    preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+[0-9]|[a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
    $openedtags = $result[1];
	
    preg_match_all('#</([a-z]+[0-9]|[a-z]+)>#iU', $html, $result);
    $closedtags = $result[1];

    $len_opened = count($openedtags);
    if (count($closedtags) == $len_opened) {
        return $html;
    }
    $openedtags = array_reverse($openedtags);
    for ($i=0; $i < $len_opened; $i++) {
        if (!in_array($openedtags[$i], $closedtags)) {
            $html .= '</'.$openedtags[$i].'>';
        } else {
            unset($closedtags[array_search($openedtags[$i], $closedtags)]);
        }
    }
    return $html;
}

?>




<?php
// functions.php
function check_txnid($tnxid){
	global $link;
	return true;
	$valid_txnid = true;
	//get result set
	$sql = mysqli_query($conn,"SELECT * FROM `payments` WHERE txnid = '$tnxid'", $link);
	if ($row = @mysqli_fetch_array($sql)) {
		$valid_txnid = false;
	}
	return $valid_txnid;
}

function check_price($price, $id){
	$valid_price = false;
	//you could use the below to check whether the correct price has been paid for the product
	
	/*
	$sql = mysqli_query($conn,"SELECT amount FROM `products` WHERE id = '$id'");
	if (mysqli_num_row($sql) != 0) {
		while ($row = @mysqli_fetch_array($sql)) {
			$num = (float)$row['amount'];
			if($num == $price){
				$valid_price = true;
			}
		}
	}
	return $valid_price;
	*/
	return true;
}
function get_parameter(){
global $link;
global $page_url;
$p=str_replace($link,'',$page_url);
$k=explode("/",$p);
return $k;

}
?>
<?php
// Converts a number into a short version, eg: 1000 -> 1k
// Based on: http://stackoverflow.com/a/4371114
function number_format_short( $n, $precision = 1 ) {
	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}
  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}
	return $n_format . $suffix;
}
?>
<?php  
function influencer_payout($code,$percentage){
global $conn;
$s=0;
$sql124 = "SELECT distinct(order_id) FROM sk_order where coupon = '".member_details($_SESSION['login'],'referral_code')."' order by sl_id desc";
$res124=mysqli_query($conn,$sql124);
while($row124=mysqli_fetch_array($res124)){
		
 $sql = "SELECT * FROM sk_order where order_id=".$row124['order_id'];
 $res=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($res);
    $s +=    $row['total'];
}

    return $s * (10/100);

}
?>
<?php 
date_default_timezone_set("Asia/Kolkata");
 date_default_timezone_get();
//  date("Y-m-d h:i:sa"); 
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
/*
$PublicIP = get_client_ip();
$link_data = "http://ipinfo.io/".$PublicIP."/geo";
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json     = json_decode($json, true);
$country  = $json['country'];
$region   = $json['region'];
$city     = $json['city'];


// url to inspect
$url1 = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$file_name1 = basename(parse_url($url, PHP_URL_PATH));
$time = date("Y-m-d h:i:sa");
$device = $_SERVER["HTTP_USER_AGENT"];
$platform = '';
if(isMobileDevice()){$platform ='mobile';}else{$platform ='pc';}
$user_info_data='';
if(member_details($_SESSION['login'],'phone') != ''){
 $user_info_data=   member_details($_SESSION['login'],'phone');
}else{
 $user_info_data=   member_details($_SESSION['login'],'email');
}
 $sql="insert into visits (page,datetime,device,country,region,city,platform,phone) values('$url1','$time','$device','$link_data','$region','$city','$platform','".$user_info_data."')";
$res=mysqli_query($conn,$sql);
*/
?>