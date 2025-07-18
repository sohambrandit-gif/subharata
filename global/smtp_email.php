<?php  //include 'connection.php'; ?>

<?php
// Include library PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Start
$mail = new PHPMailer(true);

function email($to,$name,$subject,$body){
global $company;
global $mail;
try {
    // Configuration SMTP
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Show output (Disable in production)
    $mail->isSMTP();                                               // Activate SMTP sending
    $mail->Host  = 'smtp.hostinger.com';                     // SMTP Server
    $mail->SMTPAuth  = true;                                       // SMTP Identification
    $mail->Username  = 'helpdesk@thepurnima.com';                  // SMTP User
    $mail->Password  = 'Passwordpurnima123@#';	          // SMTP Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port  = 587;
    $mail->setFrom('helpdesk@thepurnima.com', $company);                // Mail sender

    // Recipients
    $mail->addAddress($to, $name);  // Email and recipient's name

    // Mail content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body  = '<table align="center" width="375" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td colspan="2" align="left" width="165" bgcolor="#000000" style="padding-left:10px;text-align: center;">
              <a href="">
                <img src="https://thepurnima.com/images/logo/logo-black.jpg" width="170" alt="Purnima Logo" title="Purnima Logo" class="CToWUd" data-bit="iit">
              </a>
			  <p style="margin: 0 14px;font-family: Inter,sans-serif;color:white;"><strong>Purnima - One Stop Online Saree Store</strong></p>
            </td>
            
          </tr>
          <tr>
            <td colspan="2" align="left" width="375" bgcolor="#000000" style="font-family:Inter,sans-serif;font-weight:400;text-align:left">
              <div style="background-color:#fff5ef;padding-left:20px;padding-bottom:30px;font-size:18px"></div>
              <div style="padding:20px;padding-bottom:10px;border-radius:30px 30px 0 0;background-color:white;font-size:16px;line-height:24px">
                <p style="margin-top:0">Dear '.$name.',</p>
               '.$body.'
             
               <p>We hope you love your saree! Stay connected with us on thepurnima.com for the latest collections and offers.</p>

                <p>Thank you for choosing Purnima : One Stop Online Saree Store !</p>
              </div>
            </td>
          </tr>
          <tr>
            <td align="left" width="250" style="padding:0 0 20px 20px;box-sizing:border-box;font-family:Inter,sans-serif;background-color:white">
              <p style="font-size:15px;font-weight:600;width:220px">
                Warm Regards,<br>
                Team Purnima  
              </p>
             
            </td>
            <td align="right" valign="bottom" width="130" style="background-color:white">&nbsp;</td>
          </tr>
          
          <tr>
            <td colspan="2" align="center" bgcolor="#760d76" style="padding: 1px;">
             
            </td>
          </tr>
		  
		  
		  <tr>
            <td colspan="2" align="left"  style="padding:0 0 20px 20px;box-sizing:border-box;font-family:Inter,sans-serif;background-color:white">
             
              <p style="font-size:12px;margin-top:30px">
               If you have any questions, reply to this email or contact us at 
              </p>
              <a style="color:#00b9f5;font-size:14px;" href="tel:+917596024545;" target="_blank">+917596024545</a>
			  <br/>
			  <a style="color:#00b9f5;font-size:14px;margin-top:10px;" href="mailto:Helpdesk@thepurnima.com;" target="_blank">Helpdesk@thepurnima.com</a>
            </td>
           
          </tr>
        </tbody>
      </table>';
    $mail->AltBody = 'Mail content in plain text for mail clients that do not support HTML';
    $mail->send();
   return true;
} catch (Exception $e) {
      return false;
    //echo "Message has not been sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
<?php // email('thinkbrandit.sayandeep@gmail.com','sayandeep','subject','<p>hello</p>'); 
?>