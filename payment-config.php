<?php

define('TEST_MODE', true);
define('TEST_EMAIL', false);
define('COMPANY_NAME', 'Test Mode');
define('FORM_NAME', 'Test Mode');
define('DONATION', false);


if (DONATION) {
    define('RECURRING', true);
    $donation_amounts = array(10, 25, 50, 100, 200);
} else {
    $payments = array();
}

$gateways = array(
    'paypal'    => true,
    'authorize' => false,
    'payeezy'   => false,
    'stripe'    => false,
    'square'    => false,
    'nmi'       => false
);

$required = array();

if (TEST_MODE) {
    //NOTE: PAYPAL
    define("PAYPAL_USERNAME", "sb-rnbu325581475_api1.business.example.com");
    define("PAYPAL_PASSWORD", "4TMK9Z8SYFVVK4FS");
    define("PAYPAL_SIGNATURE", "AXggd0bDykJFnFypp-y.VMfCG3IFAwRrcZNv5UBxk6Xfa9sCoK0AatpE");
} else {

    //NOTE: PAYPAL
    define('PAYPAL_USERNAME', 'z');
    define('PAYPAL_PASSWORD', '1');
    define('PAYPAL_SIGNATURE', '1');
}
