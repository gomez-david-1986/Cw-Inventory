<?php
require_once __DIR__ . '/vendor/phpqrcode/qrlib.php';

// Displays QR Code image to the browser
QRcode::png('PHP QR Code :)');
