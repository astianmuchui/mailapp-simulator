<?php
    // Send an email to the sender to confirm that the other email was sent     
    require "mail.php";
    $company = "Astian mail services";
    $company_mail = "bookings.iastian@gmail.com";
    $additional_headers = "MIME-Version: 1.0" ."\r\n";
    $additional_headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
    $additional_headers .= "From: " .$company. "<".$company_mail.">". "\r\n";
    #check if email was sent
        $reply_subject = "confirmation";    
        $message = '
        <h1>Your email was sent to '.$toEmail.'</h1>
            <h2>thank you for trusting us to do your communications for you</h2>
            <h3>This is a system generated email please do not reply</h3>
        ';
    if(mail($toEmail , $subject , $body ,$headers)){
        mail($email,$reply_subject,$message,$additional_headers);
    }
    mail($email,$reply_subject,$message,$additional_headers);


     

?>