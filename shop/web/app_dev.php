<?php

use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read https://symfony.com/doc/current/setup.html#checking-symfony-application-configuration-and-setup
// for more information
//umask(0000);
// Determine Client IP address

$clientIp = null;
$ipHeaders = [
    'X_FORWARDED_FOR',
    'HTTP_X_FORWARDED_FOR',
    'REMOTE_ADDR',
];

foreach ($ipHeaders as $header) {
    if (!empty($_SERVER[$header])) {
        $clientIp = $_SERVER[$header];
        break;
    }
}

$accessGranted = false;
foreach ([
 '((10\.\d{1,3})|(192\.168)|(172\.((1[6-9])|(2\d)|(3[01]))))\.\d{1,3}.\d{1,3}', // RFC 1918 private IP addresses https://tools.ietf.org/html/rfc1918#section-3
] as $pattern) {
    if (preg_match(sprintf('#^%s$#', $pattern), $clientIp)) {
        $accessGranted = true;
        break;
    }
}

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (!$accessGranted) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
