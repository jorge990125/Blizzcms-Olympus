<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * PayPal Currency
 *
 * Check the available currencies in:
 * https://developer.paypal.com/docs/classic/api/currency_codes/
 *
*/
$config['paypal_currency'] = 'USD';

/**
 *
 * PayPal Mode
 *
 * Options Available:
 *
 * sandbox = Testing the code end-to-end
 * live    = Ready for production
 *
*/
$config['paypal_mode'] = 'live';

/**
 *
 * PayPal Client ID
 *
 * Check your client id in:
 * https://developer.paypal.com/developer/applications
 *
*/
$config['paypal_userid'] = 'AZmhhGpX_yDBygQkMLWVNPsP12qqXv38xEILeE1H8hyIMcltezDJ24eSGEJD7NlAIb2pUOAro4-lgCP3';

/**
 *
 * PayPal Secret Password
 *
 * Check your secret password in:
 * https://developer.paypal.com/developer/applications
 *
*/
$config['paypal_secretpass'] = 'EBvnd3cw-3cQmZTJB7RHQdLIpae6kba7KYpqqIpxUyRmq2pfLXuRglyBXHTEHOGQI2F0EmHNfqXNPkqA';

/**
 *
 * PayPal Currency Symbol
 *
 * Write the symbol of currency used in paypal
 *
*/
$config['paypal_currency_symbol'] = '$';
