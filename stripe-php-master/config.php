<?php
require('stripe-php-master/init.php');
$publishableKey = "pk_test_51KwJzgSIiWnonJATUik50FkUovdrt9cOJJroXtWCced8IoJFFyqYs5yZ4NLmFUWMtU0Kh2cSku96XzyGbAREuzMD00nyfSCyht";
$secretKey = "sk_test_51KwJzgSIiWnonJATqD5XoptXW5RtgTTsjMq2S0g4Rw40F2zTvLlBW0fUHOipCnzlv5waUhUza5wLOyeQxT5OXaLj00QneVCOui";
\Stripe\Stripe::setApiKey($secretKey);

?>