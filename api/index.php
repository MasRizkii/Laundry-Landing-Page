<?php

$_ENV['VERCEL'] = $_SERVER['VERCEL'] = '1';
putenv('VERCEL=1');

// Storage directory in /tmp
$storage = '/tmp/storage';
if (! is_dir($storage.'/framework/views')) {
    @mkdir($storage.'/framework/views', 0777, true);
    @mkdir($storage.'/framework/cache/data', 0777, true);
    @mkdir($storage.'/framework/sessions', 0777, true);
    @mkdir($storage.'/logs', 0777, true);
}

// Redirect cache paths to writable /tmp
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_EVENTS_CACHE=/tmp/events.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

$_ENV['APP_CONFIG_CACHE'] = $_SERVER['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['APP_EVENTS_CACHE'] = $_SERVER['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_ENV['APP_PACKAGES_CACHE'] = $_SERVER['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_ROUTES_CACHE'] = $_SERVER['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_ENV['APP_SERVICES_CACHE'] = $_SERVER['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['VIEW_COMPILED_PATH'] = $_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

require __DIR__.'/../public/index.php';
