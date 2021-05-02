<?php
    session_start();
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $FIRST_EMAIL= $_POST['email'];
        $SECOND_EMAIL = $_POST['recepient'];
        $message = $_POST['message'];
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " .$name. "<".$FIRST_EMAIL.">". "\r\n";

        $body = '
        <p>'.$message.'</p>
        ';
        $control = mail($SECOND_EMAIL,$subject,$body,$headers);
        if($control){
          #Transmit sender email to reply page.
          $_SESSION['sender'] = $FIRST_EMAIL;
          $_SESSION['recepient'] = $SECOND_EMAIL;
          header("Location : ./server/reply.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8">
<link rel="stylesheet" href="./assets/css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Project 725</title>
</head>
<body>
<a href="#" id="trigger">Launch</a>
<center>
<div id="modal" class="modal">
        <div class="modal-content">
            <span id="span">&times;</span>
            <!-- <h1>Simple modal</h1> -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="form-group">
            <input type="text" name="name" required id="" placeholder="Name">
            <input type="text" name="subject" required id="" placeholder="Subject">
            <input type="email" name="email" id="" required placeholder="Sender's Email">
            <input type="email" name="recepient" id="" required placeholder="Receipent's Email">
            </div>
            <textarea name="message"  placeholder="Message" required id="" cols="30" rows="10"></textarea> <br> <br>
            <input type="submit" value="Send" name="send" class="btn">
        </form>

        </div>
</div>

</center>
<script src="./assets/javascript/main.js"></script>
</body></html>
