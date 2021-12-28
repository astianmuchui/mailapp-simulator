<?php
    // Send an email to the sender to confirm that the other email was sent
    session_start();
      define("APP_ROOT","./classes.php");
      require APP_ROOT;
      $reply = new reply;
      $reply->Send();
?>
