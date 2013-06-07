<?php

$wsdlPath = 'https://amsel.dpwn.net/abholportal/gw/lp/schema/1.0/var3ws.wsdl';
$callPath = 'https://amsel.dpwn.net/abholportal/gw/lp/SoapConnector';

$callOptions = array();

$bookOptions = array(
    'portalId' => '123test',
    'deliveryName' => 'RetoureDeutschland',
    'labelFormat' => 'pdf',
    'senderName1' => 'customerName',
    'senderStreet' => 'Musterstraße',
    'senderStreetNumber' => '1',
    'senderPostalCode' => '12345',
    'senderCity' => 'Musterstadt',
);

require_once('DHLHelper.php');

$service = new DHLRequest($wsdlPath, $callOptions, 'test', 'geheim');

$request = new BookLabelRequestType();
$request->portalId = '123test';
$request->deliveryName = 'RetoureDeutschland';
$request->labelFormat = 'pdf';
$request->senderName1 = 'customerName';
$request->senderStreet = 'Musterstraße';
$request->senderStreetNumber = '1';
$request->senderPostalCode = '12345';
$request->senderCity = 'Musterstadt';

$response = $service->BookLabel($request);

print_r($response);
