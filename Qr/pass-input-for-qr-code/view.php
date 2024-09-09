<?php
// initialize PHP parameter to send to the QR code generator
$QRParameter = 1234;
?>
<img src="generate.php?id=<?php echo $QRParameter; ?>" />