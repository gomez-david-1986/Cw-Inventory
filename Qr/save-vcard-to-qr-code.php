<?php
require_once __DIR__ . '/vendor/phpqrcode/qrlib.php';
$target = "uploads/qr-code-phone/";
// Contact details
$name = 'Example1';
$phone = '(091)700-001-711';
// QR code cotent with VACARD
$qrCode = 'BEGIN:VCARD' . "\n";
$qrCode .= 'FN:' . $name . "\n";
$qrCode .= 'TEL;WORK;VOICE:' . $phone . "\n";
$qrCode .= 'END:VCARD';
// Attaching VCARD to QR code
QRcode::png($qrCode, $target. 'vcard-qr-code.png', QR_ECLEVEL_L, 3);
?>
<img src="<?php echo $target; ?>vcard-qr-code.png" /> 