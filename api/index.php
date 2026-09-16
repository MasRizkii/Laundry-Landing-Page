<?php

// Pastikan direktori storage ada di /tmp untuk serverless Vercel
$storage = '/tmp/storage';
if (!is_dir($storage . '/framework/views')) {
    @mkdir($storage . '/framework/views', 0777, true);
    @mkdir($storage . '/framework/cache', 0777, true);
    @mkdir($storage . '/framework/sessions', 0777, true);
    @mkdir($storage . '/logs', 0777, true);
}

require __DIR__ . '/../public/index.php';