<?php
session_start();
ob_start();

$company = 'subhabrata';
$link = "http:8080//localhost/subhabrata/";
$page_url = $link.$_SERVER["REQUEST_URI"];
$page = preg_replace("/(.+)\.php$/", "$1", basename($_SERVER['PHP_SELF']));

$warehouse = ['Kolkata'];

$my_email = "helpdesk@devapanam.com";
$fmy_email = "-fhelpdesk@devapanam.com";

//$support_phone = '917596024545';

$host = 'localhost';
$db = 'subhabrata';
$user = 'root';
$pass = '';


$cookieTime = 2678400;

//$google_map_api_key="AIzaSyDPvV8_f2-tmf94jYAXuB4MQOxKyLs_Jok";

$conn = mysqli_connect($host, $user, $pass, $db);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$testPayment = 1;
if ($testPayment == 1) {
	$razorKey_id = "rzp_test_i8cw3r3FTgcSNL";
	$razorKey_secret = "t0xMtDiIfagnzwG8InucnTJH";
} else {
	$razorKey_id = "rzp_live_DivKCDIingbD5A";
	$razorKey_secret = "e44DNCfb9OdKOQzra1JXVbjK";
}


?>
<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

?>