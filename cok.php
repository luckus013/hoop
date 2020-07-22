<?php
function randStr($l){
	$data = "abcdefghijklmn1234567890opqrstuvwxyz";
	$word = "";
	for($a=0;$a<$l;$a++){
		$word .= $data{rand(0,strlen($data)-1)};
	}
	return $word;
}
function garap($ref){
	$id = "14cc7ba1-5bcb-ea11-93f9-c22eb21".rand(12345,99999);
	$body = "{\"ReferalCode\":\"$ref\",\"MembershipID\":\"$id\"}";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://stylesapi.lippomalls.com/api/membership/inputreferal');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Content-Length: '.strlen($body);
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Host: stylesapi.lippomalls.com';
	$headers[] = 'Connection: close';
	$headers[] = 'User-Agent: okhttp/3.12.1';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, FALSE);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
echo "ReferalCode	";
$ref = trim(fgets(STDIN));
for($a=0;$a<1000;$a++){
	echo garap($ref)."\n";
}