<?php
$text = "<span style='color:red; font-size: 35px; line-height: 40px; margin: 10px;'>Error! Please try again.</span>";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "youremail@gmail.com";
    $subject = "Ireland";
    $message = " Name: " . $name . "\r\n Email: " . $email . "\r\n Message:\r\n" . $message;
    
    $from = "Zerotheme";
    $headers = "From:" . $from . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";
    
    // send
    if (@mail($to, $subject, $message, $headers)) {
        $text = "<span style='color:blue; font-size: 35px; line-height: 40px; margin: 10px;'>Your Message was sent successfully !</span>";
    }
    
    echo $text;
}
?>
