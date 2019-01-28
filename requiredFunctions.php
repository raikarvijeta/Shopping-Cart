<?php
//genrate random password for reset button
function getRandomBytes($nbBytes = 32){
	$bytes = openssl_random_pseudo_bytes($nbBytes, $strong);
	if (false !== $bytes && true === $strong){
		return $bytes;
	}else{
		throw new \Exception("Unable to generate secure token from OpenSSL.");
	}
}

function generatePassword($length){
	return substr(preg_replace("/[^a-zA-Z0-9]/", "", base64_encode(getRandomBytes($length+1))),0,$length);
}
?>
