<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;


//instancia princiapal payload pix
$obPayload = (new Payload)->setPixKey('04406406956')
    ->setDescription('Pagamento do pedido')
    ->setMerchantCity('minas gerais')
    ->setMerchantName('Rodrigo')
    ->setAmout(5.00)
    ->setTxid('Rodrigo');
//payload codigo
$payloadQrCode = $obPayload->getPayload();
$obQrCode = new QrCode($payloadQrCode);

$image = (new Output\Png)->output($obQrCode, 400);

?>
<h1>QR CODE PIX</h1>
<br>
<img src="data:image/png;base64,<?= base64_encode($image) ?>"><br><br>

Codigo pix: <br>
<strong><?= $payloadQrCode ?></strong>