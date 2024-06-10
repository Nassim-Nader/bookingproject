<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
require('../inc/sendgrid-php/sendgrid-php.php');
require '../inc/vendor/autoload.php';

function send_mail($uemail, $token, $type)
{
    if ($type == "email_confirmation") {
        $page = 'email_confirm.php';
        $subject = "Account Verification Link";
        $content = "confirm your email";
    } else {
        $page = 'index.php';
        $subject = "Account Reset Link";
        $content = "reset your account";
    }

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom(SENDGRID_EMAIL, SENDGRID_NAME);
    $email->setSubject($subject);
    $email->addTo($uemail);
    $email->addContent(
        "text/html",
        "Click the link to $content: <br>
        <a href='" . SITE_URL . "$page?$type&email=$uemail&token=$token'>CLICK ME</a>"
    );

    $sendgrid = new \SendGrid(SENDGRID_API_KEY);

    try {
        $sendgrid->client->setCurlOption(CURLOPT_SSL_VERIFYHOST, 0);
        $sendgrid->client->setCurlOption(CURLOPT_SSL_VERIFYPEER, 0);
        $response = $sendgrid->send($email);
        file_put_contents('sendgrid_log.txt', "Response Status: " . $response->statusCode() . "\nResponse Body: " . $response->body() . "\n", FILE_APPEND);
        return 1;
    } catch (Exception $e) {
        file_put_contents('sendgrid_log.txt', "Caught exception: " . $e->getMessage() . "\n", FILE_APPEND);
        return 0;
    }
    
}

// Test the send_mail function directly
$test_email = 'nassimghoul200109@gmail.com';
$test_token = bin2hex(random_bytes(16));
$test_type = 'email_confirmation';

if (send_mail($test_email, $test_token, $test_type)) {
    echo 'Email sent successfully!';
} else {
    echo 'Failed to send email.';
}
?>
