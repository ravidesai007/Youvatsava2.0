<?php
	$otp = rand(1000,9999);
	$phone = "+919325235592"; // target number; includes ISD
	$api_key = '9b16216d-9697-11ed-9158-0200cd936042'; // API Key
	$req = "https://2factor.in/API/V1/".$api_key."/SMS/".$phone."/".$otp;
	$sms = file_get_contents($req);
	$sms_status = json_decode($sms, true);
	if($sms_status['Status'] !== 'Success') {
		$err['error'] = 'Could not send OTP to '.$phone;
	}
?>