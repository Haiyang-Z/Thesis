<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }

    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    if (empty($errors)) {
        $to = "123104052@umail.ucc.ie";
        $subject = "IrishTravelConnections Website inquiries";
        $email_message = "Name: " . $name . "\r\nEmail: " . $email . "\r\nMessage:\r\n" . $message;
        
        $headers = "From: IrishTravelConnections Website <123104052@umail.ucc.ie>\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";

        if (mail($to, $subject, $email_message, $headers)) {
            $text = "<span style='color:blue; font-size: 35px; line-height: 40px; margin: 10px;'>Your Message was sent successfully!</span>";
        } else {
            $text = "<span style='color:red; font-size: 35px; line-height: 40px; margin: 10px;'>Error! Please try again.</span>";
        }
    } else {
        $text = "<span style='color:red; font-size: 35px; line-height: 40px; margin: 10px;'>" . implode("<br>", $errors) . "</span>";
    }

    echo $text;
}
?>
