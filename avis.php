<?php
/********************************************************/
/*			Control the weather V1.0					*/
/*			By Albert Seuba	- 042319					*/
/********************************************************/

$json4 = file_get_contents('php://input'); 
$object = json_decode($json4, true);
$contactkey = $object['inArguments'][1]['contactkey'];

//echo $missatge;



$ur = 'https://pub.s6.exacttarget.com/deq13jnmlxs?contactkey='.$contactkey;
$ch = curl_init($ur);
$http_headers = array(
    'User-Agent: Junk', // Any User-Agent will do here
);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $http_headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);



//devolvemos el outArgument al config.json para utilizar en la split activity (true | false)
echo '{"status": "success"}';

?>
