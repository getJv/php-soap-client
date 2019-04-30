<?php
echo "<pre>";

$urlWsdl = 'https://apphom.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl';
try {

    $soapClient = new \SoapClient($urlWsdl, [
        'exceptions' => true,
        'trace' => true
    ]);

    $requestData = [ 'cep' => '72800400' ]; 

    $response = $soapClient->consultaCEP($requestData);

    print_r($response);

} catch (SoapFault $exception) {

    trigger_error("SOAP Fault: (faultcode: " . $fault->faultcode . ", faultstring: " . $fault->faultstring . ")", E_USER_ERROR);

}catch(Exception $e) {
    trigger_error("SOAP Error: " . $e->getMessage(), E_USER_ERROR);
}