<?php
require_once __DIR__ . '/vendor/phpqrcode/qrlib.php';
require_once __DIR__ . '/vendor/phpqrcode/qrconst.php';

$qrContent = 'Demo data to bundle into a QR code';

$target = "uploads/ecc-level/";

// generating QR code in the 4 ECC level
QRcode::png($qrContent, $target . 'l.png', QR_ECLEVEL_L);
QRcode::png($qrContent, $target . 'm.png', QR_ECLEVEL_M);
QRcode::png($qrContent, $target . 'q.png', QR_ECLEVEL_Q);
QRcode::png($qrContent, $target . 'h.png', QR_ECLEVEL_H);

?>
<img src="<?php echo $target; ?>l.png" />
<img src="<?php echo $target; ?>m.png" />
<img src="<?php echo $target; ?>q.png" />
<img src="<?php echo $target; ?>h.png" />    