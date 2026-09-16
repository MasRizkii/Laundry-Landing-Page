<?php

// Pastikan direktori cache blade ada di /tmp untuk serverless Vercel
if (!is_dir('/tmp/views')) {
    @mkdir('/tmp/views', 0755, true);
}

require __DIR__ . '/../public/index.php';