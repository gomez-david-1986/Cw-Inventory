<?php
require_once __DIR__ . '/vendor/phpqrcode/qrlib.php';

// how to configure silent zone (frame) size
$qrContent = array('content' => 'Contact information', 'slug' => 'contact-info');

$target = "uploads/qr-code-dir/";
$filePath = $target . 'ouput-qr-code-' . $qrContent['slug'] . '.png';

if (!file_exists($filePath)) {
    QRcode::png($qrContent['content'], $filePath);
}
?>
<img src="<?php echo $filePath; ?>" />