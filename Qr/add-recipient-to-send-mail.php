<?php
require_once __DIR__ . '/vendor/phpqrcode/qrlib.php';
$target = "uploads/qr-code-phone/";
$recipient = 'vincy@example.com';
$mailSubject = 'Enquiry';
$mailBody = 'Post enquiry content';
// Prepare QR content withe email recipient, subject and body
$qrContent = 'mailto:' . $recipient . '?subject=' . urlencode($mailSubject) . '&body=' . urlencode($mailBody);
// Attach maileto link to the QRCode
QRcode::png($qrContent, $target. 'mail.png', QR_ECLEVEL_L, 3);
?>
<img src="<?php echo $target; ?>mail.png" /> 