<?php

class BookLabelRequestType{
    var $portalId;//string
    var $deliveryName;//string
    var $customerReference;//anonymous1
    var $shipmentReference;//anonymous2
    var $labelFormat;//anonymous3
    var $senderName1;//anonymous4
    var $senderName2;//anonymous5
    var $senderCareOfName;//anonymous6
    var $senderContactPhone;//anonymous7
    var $senderContactEmail;//anonymous8
    var $senderStreet;//anonymous9
    var $senderStreetNumber;//anonymous10
    var $senderHouseName;//anonymous11
    var $senderBoxNumber;//anonymous12
    var $senderPostalCode;//anonymous13
    var $senderCity;//anonymous14
    var $senderDistrict;//anonymous15
    var $senderCounty;//anonymous16
    var $itemWeight;//anonymous17
    var $itemWorth;//anonymous18
    var $custom1;//anonymous19
    var $custom2;//anonymous20
    var $custom3;//anonymous21
    var $custom4;//anonymous22
    var $custom5;//anonymous23
    var $dutyContent1;//anonymous24
    var $dutyAmount1;//anonymous25
    var $dutyWeight1;//anonymous26
    var $dutyWorth1;//anonymous27
    var $dutyCurrency1;//anonymous28
    var $dutyContent2;//anonymous29
    var $dutyAmount2;//anonymous30
    var $dutyWeight2;//anonymous31
    var $dutyWorth2;//anonymous32
    var $dutyCurrency2;//anonymous33
    var $dutyContent3;//anonymous34
    var $dutyAmount3;//anonymous35
    var $dutyWeight3;//anonymous36
    var $dutyWorth3;//anonymous37
    var $dutyCurrency3;//anonymous38
    var $dutyContent4;//anonymous39
    var $dutyAmount4;//anonymous40
    var $dutyWeight4;//anonymous41
    var $dutyWorth4;//anonymous42
    var $dutyCurrency4;//anonymous43
}
class BookLabelResponseType{
    var $label;//string
    var $issueDate;//anonymous45
    var $routingCode;//string
    var $idc;//string
    var $idcType;//string
    var $intIdc;//string
    var $intIdcType;//string
}
class WsRequestType{
}
class WsResponseType{
}
class DHLRequest
{
    var $soapClient;

    private static $classmap = array('BookLabelRequestType'=>'BookLabelRequestType'
    ,'BookLabelResponseType'=>'BookLabelResponseType'
    ,'WsRequestType'=>'WsRequestType'
    ,'WsResponseType'=>'WsResponseType'

    );

    function __construct($url='https://amsel.dpwn.net/abholportal/gw/lp/schema/1.0/var3ws.wsdl',
                         $options = array(), $username = '', $password = '')
    {
        $defaultOptions = array("classmap"=>self::$classmap,"trace" => true,"exceptions" => true);
        $callOptions = array_merge($defaultOptions, $options);

        $ns = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';

        $token = new stdClass();
        $token->Username = new SOAPVar($username, XSD_STRING, null, null, null, $ns);
        $token->Password = new SOAPVar($password, XSD_STRING, null, null, null, $ns);

        $wsec = new stdClass;
        $wsec->UsernameToken = new SoapVar($token, SOAP_ENC_OBJECT, null, null, null, $ns);

        $headers = new SOAPHeader($ns, 'Security', $wsec, true);

        $this->soapClient = new SoapClient($url, $callOptions);
        $this->soapClient->__setSoapHeaders($headers);
    }

    function BookLabel($BookLabelRequestType)
    {
        $BookLabelResponseType = $this->soapClient->BookLabel($BookLabelRequestType);
        return $BookLabelResponseType;
    }
}

?>