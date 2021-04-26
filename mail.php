<?php
    //Get form data

    //check for submit
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " .$name. "<".$email.">". "\r\n";
        $toEmail = $_POST['recepient'];
        $subject = $_POST['subject'];    
        $body = '
            <h1>you have received an email from <br> '.$name.'</h1>
            <h2>'.$email.'</h2>
            <h3>Message :</h3> <br>
            <p> '.$message.' </p>
        ';
        if(empty($name) && empty($email) && empty($message)){
            return false;
        }else{
            return true;
        }
        if(filter_var($email , FILTER_VALIDATE_EMAIL) === true){
            return true;
        }

    }

    mail($toEmail , $subject , $body ,$headers);
?>
