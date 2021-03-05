<?php 
    class mail {  
        private $receiver = "test@developers-alliance.com"; 
        private $subject = "Submitted Data"; 
        private $body;
        private $sender = "From: sandroqoiava7@gmail.com"; 

        public function send($f,$l,$e) {  
            $this->body = "Firsname : $f, Lastname: $l, Email: $e";

            if(mail($this->receiver, $this->subject, $this->body, $this->sender)) {
                echo "<script>alert('Email sent successfully to $this->receiver')</script>";
            }else{
                echo "<script>alert('Sorry, failed while sending mail!')</script>";
            }
        }
        
    }
?>