<?php include "connection.php";
?>
<?php 
function time_difference($time1,$time2) 
{ 
$time1 = strtotime($time1); 
$time2 = strtotime($time2); 
if ($time2 < $time1) 
{ 
return $time1-$time2;
} 
else{
return ($time2 - $time1) ; 
} 
} ?>
<?php	
function timezone($zone){
switch($zone){
case "-12.0":
$k= "(GMT -12:00) Eniwetok, Kwajalein ";break;
case "-11.0":
$k= "(GMT -11:00) Midway Island, Samoa ";break;
case "-10.0":
$k= "(GMT -10:00) Hawaii ";break;
case "-9.0":
$k= "(GMT -9:00) Alaska ";break;
case "-8.0":
$k= "(GMT -8:00) Pacific Time (US and Canada) ";break;
case "-7.0":
$k= "(GMT -7:00) Mountain Time (US and Canada) ";break;
case "-6.0":
$k= "(GMT -6:00) Central Time (US and Canada), Mexico City ";break;
case "-5.0":
$k= "(GMT -5:00) Eastern Time (US and Canada), Bogota, Lima ";break;
case "-4.0":
$k= "(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz ";break;
case "-3.5":
$k= "(GMT -3:30) Newfoundland ";break;
case "-3.0":
$k= "(GMT -3:00) Brazil, Buenos Aires, Georgetown ";break;
case "-2.0":
$k= "(GMT -2:00) Mid-Atlantic ";break;
case "-1.0":
$k= "(GMT -1:00 hour) Azores, Cape Verde Islands ";break;
case "0.0":
$k= "(GMT) Western Europe Time, London, Lisbon, Casablanca ";break;
case "1.0":
$k= "(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris ";break;
case "2.0":
$k= "(GMT +2:00) Kaliningrad, South Africa ";break;
case "3.0":
$k= "(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg ";break;
case "3.5":
$k= "(GMT +3:30) Tehran ";break;
case "4.0":
$k= "(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi ";break;
case "4.5":
$k= "(GMT +4:30) Kabul ";break;
case "5.0":
$k= "(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent ";break;
case "5.5":
$k= "(GMT +5:30) Bombay, Calcutta, Madras, New Delhi ";break;
case "5.75":
$k= "(GMT +5:45) Kathmandu ";break;
case "6.0":
$k= "(GMT +6:00) Almaty, Dhaka, Colombo ";break;
case "7.0":
$k= "(GMT +7:00) Bangkok, Hanoi, Jakarta ";break;
case "8.0":
$k= "(GMT +8:00) Beijing, Perth, Singapore, Hong Kong ";break;
case "9.0":
$k= "(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk ";break;
case "9.5":
$k= "(GMT +9:30) Adelaide, Darwin ";break;
case "10.0":
$k= "(GMT +10:00) Eastern Australia, Guam, Vladivostok ";break;
case "11.0":
$k= "(GMT +11:00) Magadan, Solomon Islands, New Caledonia ";break;
case "12.0":
$k= "(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka ";break;
default :
$k='';
}
return $k;
}
?>
<?php
function InsertData($TblName,$Fields,$Values)
{
   $query="INSERT INTO `{$TblName}` (`".(is_array($Fields)?implode("`,`",$Fields):$Fields)."`) VALUES (".(is_array($Values)?"'".implode("','",$Values)."'":$Values).")";
return $mysqli->query($query);
}
?>
<?php
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}
function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>
<?php
function lastId($table,$id){
//echo "SELECT * FROM `$table` ORDER BY $id DESC LIMIT 1";
$query=$mysqli->query("SELECT * FROM `$table` ORDER BY $id DESC LIMIT 1");
$row = $query -> fetch_array(MYSQLI_ASSOC);
return $row[$id];
}
?>
<?php 
function browser(){ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet-Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla-Firefox'; 
        $ub = "Firefox"; 
    } 
	 elseif(preg_match('/Edge/i',$u_agent)) 
    { 
        $bname = 'Edge'; 
        $ub = "Edge"; 
    } 
	elseif(preg_match('/OPR/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
	elseif(preg_match('/UBrowser/i',$u_agent)) 
    { 
        $bname = 'UBrowser'; 
        $ub = "UBrowser"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google-Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple-Safari'; 
        $ub = "Safari"; 
    } 
     elseif(preg_match('/Mozilla/i',$u_agent)) 
    { 
        $bname = 'Mozilla'; 
        $ub = "Mozilla"; 
    } 
	
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    return $bname;
} 
?>
<?php
$_SESSION['zone'] = $_GET['zone'];
$_SESSION['time_client'] = date('Y-m-d H:i:s',strtotime($_GET['time']));
 $_SESSION['time_local'] =gmdate('Y-m-d H:i:s');
$time_diff=time_difference($_SESSION['time_local'],$_SESSION['time_client']) ; 
$_SESSION['time_diff']=gmdate("H:i:s", $time_diff);
if($_SESSION['zone'] >=0){
 $_SESSION['timezone']=$_SESSION['time_diff'];
}
else{
 $_SESSION['timezone']="-".$_SESSION['time_diff'];
}
 $zone = $_SESSION['timezone'];
$gmt_time=$_SESSION['time_local'];
$duration=19800;
$dateinsec=strtotime($gmt_time);
$newdate=$dateinsec+$duration;
$reg_date= date('Y-m-d H:i:s',$newdate);
$width=$_GET['width'];
$height=$_GET['height'];
$device=$_GET['device'];
$track=$_GET['track'];
$browser= browser();
$ip=get_client_ip_env();
 $page=urlencode($_GET['url']);
 $location=timezone($_SESSION['zone']);
 $country=ip_info($ip,'country');
			$tblname='user_track';
			$field=array('timezone','location','ip','country','browser','width','height','device','page','datetime');    
			$data=array($zone,$location,$ip,$country,$browser,$width,$height,$device,$page,$reg_date);
			$res=InsertData($tblname,$field,$data);
			
			$return=0;
			if($_SESSION['login']!=''){
				$registered="1";
				
				$sql="select * from members where memb_id='".$_SESSION['login']."' and date< '$today'";
				$res=$mysqli->query($sql);
				$c=mysqli_num_rows($res);
				if($c>0){
				$return=1;
				}
				else{
				$return=0;
				}
			}
			else{
				$registered="0";
			}
			if($_SESSION['status_ip']==''){
			$tblname='user_returning';
			$field=array('ip','country','device','registered','date','returning');    
			$data=array($ip,$country,$device,$registered,date('Y-m-d'),$return);
			$res=InsertData($tblname,$field,$data);
			$r_id=lastId('user_returning','r_id');
		    $_SESSION['status_ip']=$r_id;
			}
			if($_SESSION['status_ip']!='' && $_SESSION['login']!='' && $_SESSION['login_update']==''){
			
			$q=$mysqli->query("update user_returning set registered='1' where r_id='".$_SESSION['status_ip']."'");
			
			$sql="select * from members where memb_id='".$_SESSION['login']."' and date< '$today'";
				$res=$mysqli->query($sql);
				$c=mysqli_num_rows($res);
				if($c>0){
				$return=1;
				}
				else{
				$return=0;
				}
				
			$_SESSION['login_update']=1;
			}
			
?>
