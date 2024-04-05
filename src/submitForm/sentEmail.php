<?php
require(__DIR__ . '/../../vendor/autoload.php');
$db_handler_class = new db_handler();
$db_handler_class->sent_email();
