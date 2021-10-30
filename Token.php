<?php

    const CURL_TIMEOUT = 0;
	const CONNECT_TIMEOUT = 0;
	function Curl($method, $url, $header, $data, $cookie){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array()));
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT,CURL_TIMEOUT);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,CONNECT_TIMEOUT);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		if ($header) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		}
		if ($data) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		if ($cookie) {
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
		}
		return curl_exec($ch);
	}

	function gettokenfb(){
	
           	while(true) {
				
			$access_tokenfb = [
			'4570195373012266|ZrEihYcOnjPyWpjiddiOIsNZE-4',
			'999239564157296|pbPyzGCrpEwueZx-RcOe_xzA788',
			'1257861128005199|aACJ9sfl3f-VJmd52ctYbg1fCwY',
			'141729258044191|ddtU3clKnyd_V3ITUPDPu59CgVY',
			'269936294522712|0bWRtz_T_6kuGhPKBkVCLMm8HHQ',
			'1537969803214398|RPhFPxPkd3TZbANsFLWXE0Q5ck8',
			'150459760562773|MKO89Z2fIuF1EXjmFgAlxuIe_qo',
			'370306807987475|7L9uba29s9bB6v4RtxHXXVie8Mo'
		    ];
		
		$bz = 0;
		do {
			$facebookgen = Curl("GET", "https://graph.facebook.com/670835880297746/accounts/test-users?access_token=".$access_tokenfb[$bz]."&installed=true&permissions=read_stream&method=post", false, false, false);
			$token = json_decode($facebookgen,true);
			$bz++;
			if ($bz > 9) {
				$bz = 0;
			}
			
		} while (empty($token['access_token']));
		
		$fpx = fopen('Token.txt', 'a'); 
		fwrite($fpx,$token['access_token']."\n");
		$fpx = fopen('info.txt', 'a'); 
		fwrite($fpx, 'Email :'.$token['email']."\n");
		fwrite($fpx, 'Password :'.$token['password']."\n");
		fwrite($fpx, 'ID :'.$token['id']."\n");
		fwrite($fpx, 'Token : '.$token['access_token']."\n");
		fwrite($fpx, '----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------'."\n");
		fclose($fpx);
		
		print("success "."\n");
		print("Email :".$token['email']."\n");
		print("Password :".$token['password']."\n");
		print("ID : :".$token['id']."\n");
		
			}
	}
	gettokenfb();
	
?>