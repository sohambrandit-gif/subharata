<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

email('thinkbrandit.sayandeep@gmail.com', 'Sayandeep');
function email($to,$subject){

 $my_email ='helpdesk@thepurnima.com';
 $company ='Purnima';
 //$to;
//echo $subject;
 
    $htmlContent = ' 
        <html> 
        <head> 
            <title>Welcome to CodexWorld</title> 
        </head> 
        <body> 
            <h1>Thanks you for joining with us!</h1> 
            <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
                <tr> 
                    <th>Name:</th><td>CodexWorld</td> 
                </tr> 
                <tr style="background-color: #e0e0e0;"> 
                    <th>Email:</th><td>contact@codexworld.com</td> 
                </tr> 
                <tr> 
                    <th>Website:</th><td><a href="http://www.codexworld.com">www.codexworld.com</a></td> 
                </tr> 
            </table> 
        </body> 
        </html>'; 
     
    // Set content-type header for sending HTML email 
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

    // Additional headers 
     $headers .= 'From: '.$company.'<'.$my_email.'>' . "\r\n"; 
     $headers .= 'Reply-To: <'.$my_email.'>' . "\r\n";
     
    //$headers .= 'Cc: welcome@example.com' . "\r\n"; 
    //$headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
    
    // Send email 
    if(mail($to, $subject, $htmlContent, $headers)){ 
        echo 'success';
        return true;
    }else{ 
         echo 'error';
       return false;
       
    }
}
?>