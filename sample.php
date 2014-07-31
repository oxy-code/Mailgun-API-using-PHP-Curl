<?php
require_once('Mailgun.php');
// Initiate with your API Key and Domain
$api_key = "your api key here";
$domain = "your domain here";
$mailgun = new Mailgun($api_key, $domain);
// With parameters
$bounced_list = $mailgun->getBounces(array('limit' => 1000));
// Without parameters
$domains = $mailgun->getDomains();
// With custom parameters and url
$messages = $mailgun->get("/$domain/bounces/lfwilson25@gmail.com", array());
echo "<pre>";
print_r($domains);
echo "</pre>";
