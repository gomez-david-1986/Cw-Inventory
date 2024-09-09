<?php
require_once __DIR__ . '/vendor/phpqrcode/qrlib.php';

$qrContent = 'Demo data to bundle into a QR code with zoom factor';

$target = "uploads/pixel-zoom-qr-code/";

// generating QR code with 4 ECC level and zoom factor
QRcode::png($qrContent, $target . 'l_1.png', QR_ECLEVEL_L, 1);
QRcode::png($qrContent, $target . 'l_2.png', QR_ECLEVEL_L, 2);
QRcode::png($qrContent, $target . 'l_3.png', QR_ECLEVEL_L, 3);
QRcode::png($qrContent, $target . 'l_4.png', QR_ECLEVEL_L, 4);

?>
<img src="<?php echo $target; ?>l_1.png" />
<img src="<?php echo $target; ?>l_2.png" />
<img src="<?php echo $target; ?>l_3.png" />
<img src="<?php echo $target; ?>l_4.png" />