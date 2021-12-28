<?php
 /*
    Mail app simulator 
    Authored by Sebastian muchui
    copyright 2021
    */
session_start();
   class Email{
      public $output;
      public $body;
      private $name;
      private $subject;
      private $FIRST_EMAIL;
      private $SECOND_EMAIL;
      private $message;
      private $headers;
      function excecute($name,$subject,$FIRST_EMAIL,$SECOND_EMAIL,$message){
         $this->name = $_POST['name'];
         $this->subject = $_POST['subject'];
         $this->FIRST_EMAIL = $_POST['email'];
         $this->SECOND_EMAIL = $_POST['recepient'];
         $this->message = $_POST['message'];
         $this->headers = "From: " .$name. "<".$FIRST_EMAIL.">". "\r\n";
         $this->body = $this->message;
         if((!empty($name)) && (!empty($subject)) && (!empty($FIRST_EMAIL))  && (!empty($SECOND_EMAIL)) && (!empty($message)) ){
               if((filter_var(
                  $FIRST_EMAIL
               ,FILTER_VALIDATE_EMAIL
               ) == true ) && 
               filter_var(
                  $SECOND_EMAIL,
                  FILTER_VALIDATE_EMAIL
               ) == true

               ){
                  //All okay
                  try{
                     if(mail($this->SECOND_EMAIL,$this->subject,$this->body,$this->headers)){
                           $_SESSION['sender'] = $this->FIRST_EMAIL;
                           $_SESSION['recepient'] = $this->SECOND_EMAIL;

                     }
                  }catch(Exception $E){
                     echo $E;
                  }

               }else{
                  $this->output = "Enter Valid Email";
               }
         }

      }

   }
   class reply{
      private $output;
      private $recepient ;
      private $sender;
      private $company = "Astian AI";
      private $company_email = "7iastian@gmail.com";
      private $additional_headers; 
      private $repl_subj = "Confirmation";
     private $message;
      function Send(){
         $this->recepient = $_SESSION['recepient'];

          $this->message = '
         <h1>Your email was sent to '.$this->recepient.'</h1>
             <h2>thank you for trusting us to do your communications for you</h2>
             <h3>This is a system generated email please do not reply</h3>';
   
         $this->additional_headers = "From: " .$this->company. "<".$this->company_email.">". "\r\n"; ;
         try {
            if(mail($this->company_email,$this->repl_subj,$this->message,$this->additional_headers)){
              header("Location: ../?Sent"); 
            }else{
               header("Location: ../?NOT_Sent");
            }
         } catch (Exception $th) {
            echo $th;
         }
      }
   }
?>
