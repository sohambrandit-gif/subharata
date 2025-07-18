<?php include 'header.php'; ?>
<?php
 function getProductStatus($shipment_id){
    try
    {
      #Login information
      $arr1=[
       "email"=>"helpdesk@thepurnima.com", # Enter Registered Username in Shiprocket
      "password"=>"Thepurnima123@#",
      ];
      $login_data=json_encode($arr1);
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/auth/login",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>$login_data,
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
        ),
      ));
      $response = curl_exec($curl);
      curl_close($curl);
      $res=json_decode($response);
      $token = null;
      #Get login Authentication token
      $token=$res->token;
      if($res->token){
        #tracking Order With Shipment id
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/courier/track/shipment/{$shipment_id}",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Authorization: Bearer {$token}"
          ),
        ));
        $response = curl_exec($curl);
        $res=json_decode($response);
        //print_r($response);
        curl_close($curl);
        return $res;   
      }
    }catch(Exception $e){
     // echo $e;
    }
  }
  
  
 $sql_order="select * from sk_order  where sl_id ='".$_GET['id']."'";
$res_order=mysqli_query($conn,$sql_order);
$row_order=mysqli_fetch_array($res_order); 

$result= getProductStatus($row_order['shiprocket_shippingid']);
  

  if($result->tracking_data->track_status==0){
    #Display Error
    $trackstatus =  'Your order will be shipped soon. Please Check After Sometime';
    $tracklink = '';
  }
  else if($result->tracking_data->track_status==1){
    #Order Status
    $trackstatus =  "Order Status : ".$o_res->tracking_data->shipment_track[0]->current_status."<br>";
    #Order Track Link
    $tracklink =  "<a href='".$result->tracking_data->track_url."' target='_blank'>Track Your Order </a>";
  }
?>






<!DOCTYPE html>

<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/modave/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Dec 2024 10:30:37 GMT -->
<head>
    <meta charset="utf-8">
    <title>Purnima: Online Saree Store</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Themesflat Modave, Multipurpose eCommerce Template">

   <!-- font -->
   <link rel="stylesheet" href="fonts/fonts.css">
   <link rel="stylesheet" href="fonts/font-icons.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/swiper-bundle.min.css">
   <link rel="stylesheet" href="css/animate.css">
   <link rel="stylesheet" type="text/css" href="css/styles.css"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/logo/favicon.png">

</head>

<body class="">
   
    <div id="wrapper">
       
        <!-- 404 -->
        <section class="flat-spacing page-404">
            <div class="container">
                <div class="page-404-inner">
                    <div class="image">
                        <img class="lazyload" data-src="assets/img/purnima.webp" src="assets/img/purnima.webp" alt="image">
                    </div>
                    <div class="content">
                        <div class="heading"  style="font-size: 51px;line-height: 2;">Tracking Status</div>
                        <div>
                            <h2 class="title mb_4"><?php echo $trackstatus; ?></h2>
                            <?php if($tracklink != ''){ ?>
                            <div class="text body-text-1 text-secondary">Thank You for your patience. Please click here to know more <?php echo $tracklink; ?><div>
                            <?php } ?>
                                <br>
                        </div>
                        <a href="order.php" class="tf-btn btn-fill"><span class="btn btn-primary">Back To Orders</span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /404 -->
        
    </div>

    <!-- Javascript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/lazysize.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>


</html>

<?php include 'footer.php'; ?>



