<?php

// Set sandbox (test mode) to true/false.
$sandbox = FALSE;

// Set PayPal API version and credentials.
$api_version = '85.0';
$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
$api_username = $sandbox ? 'arif04cuet123_api1.gmail.com' : 'amazingtutors26_api1.gmail.com';
$api_password = $sandbox ? '1363204013' : 'ACYF32KBP4G2WG2D';
$api_signature = $sandbox ? 'An5ns1Kso7MWUdW4ErQKJJJ4qi4-A0x6TP-IgocWolYhCtLcV2KkTHSH' : 'AFcWxV21C7fd0v3bYYYRCpSSRl31AZAlTbLsf.WojPjk.s8ZD40BbEiW';
