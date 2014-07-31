Mailgun-API-using-PHP-Curl
==========================

Mailgun API using PHP curl.

[![alt text](http://hackdays.ca/wp-content/uploads/2013/03/mg-logo-full-color-email-automation.png "Mailgun by Rackspace")](http://documentation.mailgun.com/)

For official documentation at http://documentation.mailgun.com

Installation
------------
Just download the Mailgun.php and move it into your working directory. That's all!

Requirements
------------
<ol>
<li>php 5.x or above.</li>
<li>php curl lib.</li>
</ol>

Usage
-----

```php

# First, instantiate the SDK with your API credentials and define your domain. 
$api_key = "your api key here";
$domain = "your domain here";
$mailgun = new Mailgun($api_key, $domain);

# With parameters
$bounced_list = $mailgun->getBounces(array('limit' => 1000));

# Without parameters
$domains = $mailgun->getDomains();

# With custom parameters and url
$messages = $mailgun->get("/$domain/bounces/lfwilson25@gmail.com", array());
```
