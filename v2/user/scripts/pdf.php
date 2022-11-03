<?php
header("Content-Type: application/octet-stream");
$file = "scripts/admit-crds/ad-crds.php?roll=182002180720&yr=&shift=&date=&code=FSU1621013EXM0036" . ".pdf";
header("Content-Disposition: attachment; filename=" . urlencode($file));
header("Content-Type: application/download");
header("Content-Description: File Transfer");
header("Content-Length: " . filesize($file));
flush(); // Not a must.
$fp = fopen($file, "r");
while (!feof($fp)) {
echo fread($fp, 65536);
flush(); // This is essential for large downloads
}
fclose($fp);
?>