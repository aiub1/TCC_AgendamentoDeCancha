<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/fpdf/phpqrcode/qrlib.php");
	
	QRCode::png ($_GET['code']);