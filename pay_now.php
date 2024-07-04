<?php
require 'inc/vendor/autoload.php';
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

$config = require('admin/inc/config_paypal.php');

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    redirect('index.php');
}

if (isset($_POST['pay_now'])) {
    $frm_data = filteration($_POST);
    $ORDER_ID = 'ORD_' . $_SESSION['uId'] . random_int(11111, 9999999);
    $CUST_ID = $_SESSION['uId'];
    $TXN_AMOUNT = $_SESSION['room']['payment'];

    // Insert payment data into database
    $query1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`, `order_id`) VALUES (?,?,?,?,?)";
    insert($query1, [
        $CUST_ID, $_SESSION['room']['id'], $frm_data['checkin'],
        $frm_data['checkout'], $ORDER_ID
    ], 'issss');

    $booking_id = mysqli_insert_id($con);

    $query2 = "INSERT INTO `booking_details`(`booking_id`, `room_name`, `price`, `total_pay`, 
            `user_name`, `phonenum`, `address`) VALUES (?,?,?,?,?,?,?)";
    insert($query2, [
        $booking_id, $_SESSION['room']['name'], $_SESSION['room']['price'], $TXN_AMOUNT,
        $frm_data['name'], $frm_data['phonenum'], $frm_data['address']
    ], 'issssss');

    // Create a new client for sandbox or live environment
    $environment = new SandboxEnvironment($config['client_id'], $config['secret']);
    $client = new PayPalHttpClient($environment);

    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');
    $request->body = [
        "intent" => "CAPTURE",
        "purchase_units" => [[
            "reference_id" => $ORDER_ID,
            "amount" => [
                "value" => $TXN_AMOUNT,
                "currency_code" => "USD"
            ]
        ]],
        "application_context" => [
            "cancel_url" => "http://localhost/bookingproject/pay_response.php?success=false&order_id=$ORDER_ID",
            "return_url" => "http://localhost/bookingproject/pay_response.php?success=true&order_id=$ORDER_ID"
        ]
    ];

    try {
        $response = $client->execute($request);
        foreach ($response->result->links as $link) {
            if ($link->rel == 'approve') {
                header("Location: $link->href");
                exit;
            }
        }
    } catch (Exception $ex) {
        echo 'Exception: ' . $ex->getMessage();
        exit;
    }
}
?>

<html>
<head>
    <title>Processing</title>
</head>
<body>
    <h1>Please do not refresh this page...</h1>
</body>
</html>
