<?php
/**
 * Release the remaining authorization for an order.
 *
 * Signal that there is no intention to perform further captures.
 */

require_once dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';

$merchantId = getenv('MERCHANT_ID') ?: '0';
$sharedSecret = getenv('SHARED_SECRET') ?: 'sharedSecret';
$orderId = getenv('ORDER_ID') ?: '12345';

$connector = Klarna\Rest\Transport\Connector::create(
    $merchantId,
    $sharedSecret,
    Klarna\Rest\Transport\ConnectorInterface::TEST_BASE_URL
);

$order = new Klarna\Rest\OrderManagement\Order($connector, $orderId);
$order->releaseRemainingAuthorization();