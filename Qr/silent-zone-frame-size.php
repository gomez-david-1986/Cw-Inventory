<?php
require_once __DIR__ . '/vendor/phpqrcode/qrlib.php';

$qrContent = 'Demo data to bundle into a QR code with frame size';

$target = "uploads/pixel-zoom-qr-code/";

// generating

// frame config values below 4 are not recomended !!!
QRcode::png($qrContent, $target . 'l_3_4.png', QR_ECLEVEL_L, 3, 4);
QRcode::png($qrContent, $target . 'l_3_6.png', QR_ECLEVEL_L, 3, 6);
QRcode::png($qrContent, $target . 'l_3_10.png', QR_ECLEVEL_L, 3, 10);

// displaying
?>
<img src="<?php echo $target; ?>l_3_4.png" />
<img src="<?php echo $target; ?>l_3_6.png" />
<img src="<?php echo $target; ?>l_3_10.png" />