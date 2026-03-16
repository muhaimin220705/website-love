<?php

// 1. Arahkan ke file autoload milik Laravel
require __DIR__ . '/../vendor/autoload.php';

// 2. Jalankan bootstrap Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Tangani permintaan yang masuk melalui public/index.php
require __DIR__ . '/../public/index.php';