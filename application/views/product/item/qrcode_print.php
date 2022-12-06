<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>QR-code Product <?= $row->barcode; ?></title>
</head>
<body>

    <img src="assets/images/qrcode/QR_Code-'<?= $row->barcode; ?>.png" width="400">
    <br><br>
    <?= $row->barcode; ?>
	
</body>
</html>