<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', true);
date_default_timezone_set('CET');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../../forwardfw/vendor/autoload.php';

$bootstrap = new ForwardFW\Bootstrap();
$bootstrap->loadConfig(__DIR__ . '/../config.php');
$bootstrap->run();
