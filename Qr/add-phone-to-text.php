<?php
require_once __DIR__ . '/vendor/phpqrcode/qrlib.php';
$target = "uploads/qr-code-phone/";
$phone = '(091)700-001-710';
// Attach phone to text
$qrContent = 'sms:' . $phone;
// generating
QRcode::png($qrContent, $target. 'phone-to-text.png', QR_ECLEVEL_L, 3);
?>
<img src="<?php echo $target; ?>phone-to-text.png" />