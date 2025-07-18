<!DOCTYPE html>
<?php include "../global/connection.php"; 

?>
 <?php
 $gst5 = 0; $gst12 = 0; $gst18 = 0;
 
 $sql123 = "SELECT * FROM contact where sl_id=1";
			$res123=mysqli_query($conn,$sql123);
			$row123=mysqli_fetch_array($res123);
		

			?>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php echo $company; ?> Invoice</title>

		<style>
			
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 14px;
				line-height: 20px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 14px;
    			line-height: 20px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.rtl table {
				text-align: right;
			}

			.rtl table tr td:nth-child(2) {
				text-align: left;
			}
			@media print
			{    
				.no-print, .no-print *
				{
					display: none !important;
				}
				.invoice-box table tr.information table td {
                        padding-bottom: 8px;
                    }
			}
		</style>
		
		<style>
/*
@import url('https://fonts.googleapis.com/css2?family=Archivo+Black&family=Caveat+Brush&family=Comforter+Brush&family=Concert+One&family=Days+One&family=Kalam:wght@300;400;700&family=Kalnia:wght@100..700&family=Kavivanar&family=League+Gothic&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Protest+Riot&display=swap');
.pacifico-regular {
  font-family: "Pacifico", cursive;
  font-weight: 400;
  font-style: normal;
  color:#177553;font-size: 25px;
}*/

@import url('https://fonts.googleapis.com/css2?family=Archivo+Black&family=Caveat+Brush&family=Comforter+Brush&family=Concert+One&family=Days+One&family=Kalam:wght@300;400;700&family=Kalnia:wght@100..700&family=Kavivanar&family=Lalezar&family=League+Gothic&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Protest+Riot&display=swap');

.pacifico-regular {
  font-family: "Lalezar", system-ui;
  font-weight: 400;
  font-style: normal;
  color:#177553;font-size: 25px;
}
</style>
	</head>

	<body onLoad="window.print();"> <!--onLoad="window.print();"-->
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table style="border-bottom:1px solid #ccc;">
							<tr>
								<td class="title">
								    <h2>Tax Invoice</h2>
									<img src="../images/logo/logo-black.jpg"/>
									<br/>
									<br/>
									<?php echo $row123['office1']; ?>  <br/>
									<?php echo $row123['office2']; ?>  <br/>

 <b>Contact us</b> <br/>
📞<?php echo $row123['phone']; ?> | 📞<?php echo $row123['whatsapp']; ?>
<br/>
 <b>Mail us</b> <br/>
 <?php echo $row123['email']; ?> 
									
								</td>
<?php
				$sql12 = "SELECT * FROM sk_order where sl_id=".$_GET['id']." order by sl_id desc ";
				$res=mysqli_query($conn,$sql12);
				$row=mysqli_fetch_array($res);
				$state=$row['state_bill'];
    			if($row['ship'] == 1) { 
    			    $state=$row['state_ship'];
    			}
				?>
								<td style="text-align:right">
								    Chayanot Retails Pvt Ltd
								    <br/>
								    CIN: U47711WB2025PTC276367
								    <br/>
								    GST: 19AAMCC4156C1ZO
								    <br/>
									EST #<?php echo $row['order_id']; ?><br />
									<?php 
								echo date('Y-m-d H:i:s', strtotime('+330 minutes', strtotime($row['datetime'])));?>
									<br/>
							
									<?php if($row['payment_id'] != '') { ?>Tranaction Id: <?php echo $row['payment_id']; ?>	
								<br/>	<?php } ?>
								Payment Status: <?php echo $row['payment']; ?>
									
								</td>
							</tr>
						</table>
					</td>
				</tr>
				
				
				<tr class="information" >
					<td colspan="2">
						<table style="border-bottom:1px solid #ccc;">
							<tr>
								<td>
									Customer: <?php echo $row['bill_name']; ?><br />
									Email: <?php echo $row['bill_email']; ?><br />
									Mobile: <?php echo $row['bill_phone']; ?><br />
								</td>

							</tr>
						</table>
					</td>
				</tr>
				
				<tr class="information" >
					<td colspan="2">
						<table style="border-bottom:1px solid #ccc;">
							<tr>
								<td>
									<h4>Billing Info</h6>
									Address: <?php echo $row['add_bill']; ?><br />
									State: <?php echo $row['state_bill']; ?><br />
									City: <?php echo $row['city_bill']; ?><br />
									Country: <?php echo $row['country_bill']; ?><br />
									Zip: <?php echo $row['zip_bill']; ?><br />
								</td>

								<td style="text-align:right">
									<?php if($row['ship'] == 1) { ?>
									<h4>Shipping Info</h6>
									Customer: <?php echo $row['ship_name']; ?><br />
									Email: <?php echo $row['ship_email']; ?><br />
									Mobile: <?php echo $row['ship_phone']; ?><br />
									Address: <?php echo $row['add_ship']; ?><br />
									State: <?php echo $row['state_ship']; ?><br />
									City: <?php echo $row['city_ship']; ?><br />
									Country: <?php echo $row['country_ship']; ?><br />
									Zip: <?php echo $row['zip_ship']; ?><br />
									<?php } else{ ?>
									<h4>Shipping Info</h6>
									Customer: <?php echo $row['bill_name']; ?><br />
									Email: <?php echo $row['bill_email']; ?><br />
									Mobile: <?php echo $row['bill_phone']; ?><br />
									Address: <?php echo $row['add_bill']; ?><br />
									State: <?php echo $row['state_bill']; ?><br />
									City: <?php echo $row['city_bill']; ?><br />
									Country: <?php echo $row['country_bill']; ?><br />
									Zip: <?php echo $row['zip_bill']; ?><br />
									<?php } ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

			</table>
			 <p><strong>Product</strong></p>
              <table class="datatable table">
                <thead>
                  <tr>
				 	<th>#id</th>
                    <th>Product</th>
					<th>Sku id</th>
					<th>Category</th>
					<th>HSN</th>
                    <th>QTY</th>
					<th>Rate</th>
					<th>Amount</th>
					<th>CGST</th>
					<th>SGST</th>
					<th>IGST</th>
					
                  </tr>
                </thead>
                	<?php
				$sql123 = "SELECT * FROM sk_order where order_id=".$row['order_id']." order by sl_id desc ";
				$res123=mysqli_query($conn,$sql123);
				$i=1;
				while($row123=mysqli_fetch_array($res123)){
				?>
                <tbody>
                  <tr>
				   <td><?php echo $i; ?></td>
                    <td><?php echo $row123['product']; ?> <?php echo $row123['size']; ?> <div style="width:20px;height:20px;background-color:<?php echo $row123['color']; ?>"></div></td>
					<td>Sku Id: <?php echo $row123['sku_id']; ?> Code:  <?php echo $row123['code']; ?></td>
				
					<td><?php echo $row123['category']; ?></td>
					<td><?php echo $row['hsn']; ?></td>
					<td><?php echo $row123['qty']; ?></td>
					<td>Rs <?php echo $row123['rate']; ?></td>
					<td>Rs <?php echo number_format($row123['qty']*$row123['rate'],2); ?></td>
					<td><?php if(in_array($state,$warehouse)){ echo $row['cgst']; }else{echo '0'; }  ?>%</td>
                   <td><?php if(in_array($state,$warehouse)){ echo $row['sgst'];  }else{echo '0'; } ?>%</td>
				   <td><?php if(!in_array($state,$warehouse)){ echo $row['igst']; }else{echo '0'; } ?>%</td>
                   <?php 
                    if(in_array($state,$warehouse)){ 
                    if($row['cgst'] == '5'){
                        $gst5 += $row['cgst'];
                    }
                     if($row['cgst'] == '12'){
                        $gst12 += $row['cgst'];
                    }
                     if($row['cgst'] == '18'){
                        $gst18 += $row['cgst'];
                    }
                    
                     if($row['sgst'] == '5'){
                        $gst5 += $row['sgst'];
                    }
                     if($row['sgst'] == '12'){
                        $gst12 += $row['sgst'];
                    }
                     if($row['sgst'] == '18'){
                        $gst18 += $row['sgst'];
                    }
                    }
                     if(!in_array($state,$warehouse)){ 
                     if($row['igst'] == '5'){
                        $gst5 += $row['igst'];
                    }
                     if($row['igst'] == '12'){
                        $gst12 += $row['igst'];
                    }
                     if($row['igst'] == '18'){
                        $gst18 += $row['igst'];
                    }
                     }
                    ?>
                  </tr>
                 
                </tbody>
				<?php $i++;} ?>
              </table>
			  <p style="width:100%; text-align:right;"><strong>Subtotal:</strong> <?php echo number_format($row['subtotal'],2); ?> Rupees</p>
			    <?php if($row['coupon'] != '' ){ ?>
			   <p style="width:100%; text-align:right;"><strong>Coupon:</strong> <?php echo $row['coupon']; ?> </p>
			   <p style="width:100%; text-align:right;"><strong>Discount:</strong><?php echo $row['coupon_val']; ?> Rupees</p>
			   <?php } ?>
			  <hr/>
			  <?php if($row['tax'] != '' ){ ?>
			  <?php  if(in_array($state,$warehouse) && $row['cgst'] !=0){ ?> <p style="width:100%; text-align:right;"><strong>CST:</strong><?php echo $row['cgst']; ?> %</p> <?php } ?>
			    <?php  if(in_array($state,$warehouse)&& $row['sgst'] !=0){ ?>  <p style="width:100%; text-align:right;"><strong>SGST:</strong><?php echo $row['sgst']; ?> %</p> <?php } ?>
			    <?php  if(!in_array($state,$warehouse)&& $row['igst'] !=0){ ?>  <p style="width:100%; text-align:right;"><strong>IGST:</strong><?php echo $row['igst']; ?> %</p> <?php } ?>
				<p style="width:100%; text-align:right;"><strong>Total Tax:</strong><?php echo $row['tax']; ?> Rupees</p>
			   <?php } ?>
			   
			  <hr/>
			  	
			  <p style="width:100%; text-align:right;"><strong>Delivery Fee:</strong>0 Rupees</p>
			    <hr/>
			  <p style="width:100%; text-align:right;"><strong>Paid Total:</strong> <?php echo number_format($row['total'],2); ?> Rupees (<?php echo $row['payment']; ?>)</p>
			  <?php if($row['payment_proof'] != '' ){ ?> <p style="width:100%; text-align:right;"><strong>Payment Proof:</strong> <a href="../uploads/payment/<?php echo $row['payment_proof']; ?>" target="_blank"><img src="../uploads/payment/<?php echo $row['payment_proof']; ?>"  width="100"/></a> </p>  <?php } ?>
			    <p style="width:100%; text-align:right;"><strong>Order Note:</strong> <?php echo $row['ordernote']; ?> </p>
			    
			  <a href="index.php" class="no-print">Back</a>
		</div>
		
		
	</body>
</html>