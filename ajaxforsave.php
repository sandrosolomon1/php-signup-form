<?php
    require 'database.php'; 
    require 'sendmail.php';
      
    $obj = new database();
    $mail = new mail(); 

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];

        $obj->add($fname,$lname,$email);
        $mail->send($fname,$lname,$email);
?>