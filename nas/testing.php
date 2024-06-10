<?php
require '../inc/vendor/autoload.php';
require('../admin/inc/essentials.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email = new \SendGrid\Mail\Mail();
$email->setFrom(SENDGRID_EMAIL, SENDGRID_NAME);
$email->setSubject("Test Email");
$email->addTo("nassimghoul200109@gmail.com");
$email->addContent(
    "text/plain",
    "This is a test email sent from SendGrid."
);

$sendgrid = new \SendGrid(SENDGRID_API_KEY);

try {
    $response = $sendgrid->send($email);
    echo "Response Status: " . $response->statusCode() . "\n";
    echo "Response Body: " . $response->body() . "\n";
    echo "Response Headers: " . json_encode($response->headers()) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
