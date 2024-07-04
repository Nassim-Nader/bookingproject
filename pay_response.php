<?php
require 'inc/vendor/autoload.php';
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

$config = require('admin/inc/config_paypal.php');

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

date_default_timezone_set("Africa/Casablanca");

session_start();

function regenrate_session($uid)
{
    $user_q = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$uid], 'i');
    $user_fetch = mysqli_fetch_assoc($user_q);

    $_SESSION['login'] = true;
    $_SESSION['uId'] = $user_fetch['id'];
    $_SESSION['uName'] = $user_fetch['name'];
    $_SESSION['uPic'] = $user_fetch['profile'];
    $_SESSION['uPhone'] = $user_fetch['phonenum'];
}

if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $orderId = $_GET['order_id'];

    $environment = new SandboxEnvironment($config['client_id'], $config['secret']);
    $client = new PayPalHttpClient($environment);

    $request = new OrdersCaptureRequest($_GET['token']);
    $request->prefer('return=representation');

    try {
        $response = $client->execute($request);

        $order_id = $_GET['order_id'];
        $slct_query = "SELECT `booking_id`,`user_id` FROM `booking_order` WHERE `order_id`=?";
        $slct_res = select($slct_query, [$order_id], 's');

        if (mysqli_num_rows($slct_res) == 0) {
            redirect('index.php');
        }

        $slct_fetch = mysqli_fetch_assoc($slct_res);

        if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
            regenrate_session($slct_fetch['user_id']);
        }

        $upd_query = "UPDATE `booking_order` SET `booking_status`='booked',
            `trans_id`=?, `trans_amt`=?, `trans_status`='TXN_SUCCESS', `trans_resp_msg`='Payment completed'
            WHERE `booking_id`=?";
        update($upd_query, [
            $response->result->id, $response->result->purchase_units[0]->payments->captures[0]->amount->value, $slct_fetch['booking_id']
        ], 'ssi');

        redirect('pay_status.php?order=' . $order_id);
    } catch (Exception $ex) {
        echo 'Exception: ' . $ex->getMessage();
        exit;
    }
} else {
    $order_id = $_GET['order_id'];
    $slct_query = "SELECT `booking_id` FROM `booking_order` WHERE `order_id`=?";
    $slct_res = select($slct_query, [$order_id], 's');

    if (mysqli_num_rows($slct_res) == 0) {
        redirect('index.php');
    }

    $slct_fetch = mysqli_fetch_assoc($slct_res);

    $upd_query = "UPDATE `booking_order` SET `booking_status`='payment failed',
        `trans_status`='TXN_FAILED', `trans_resp_msg`='Payment failed'
        WHERE `booking_id`=?";
    update($upd_query, [$slct_fetch['booking_id']], 'i');

    redirect('pay_status.php?order=' . $order_id);
}
?>
