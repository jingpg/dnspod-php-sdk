<?php

$dnspodd = new dnspodd;
$dnspodd->login_email = 'jingpg@163.com';
$dnspodd->login_password = '890710';

include 'request/userDetailRequest.php';
$req = new userDetailRequest;
$resp = $dnspodd->execute($req);
print_r($resp);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class dnspodd
{
    public $login_email = '';
    public $login_password = '';
    public $format = 'json';
    public $lang = 'en';
    public $error_on_empty = 'yes';
    public $user_id = '';
    
    public $userAgent = 'dnspodd DDNS SDK/1.0.0 (jingpg93@gmail.com)';

    public function execute($request)
    {
        $sysParams['login_email'] = $this->login_email;
        $sysParams['login_password'] = $this->login_password;
        $sysParams['format'] = $this->format;
        $sysParams['lang'] = $this->lang;
        $sysParams['error_on_empty'] = $this->error_on_empty;
        $sysParams['user_id'] = $this->user_id;
        
        $apiParams = $request->getAppParams();
        
        $params = array_merge($sysParams,$apiParams);
		
	$requestUrl = $request->getServerUrl();
        
        $postFields = array();
        foreach($params as $key => $value)
        {
                $postFields[$key] = $value;
        }

        $resp = $this->doPost($requestUrl, $postFields);
        
        return json_decode($resp);
        
    }
    
    public function doPost($url, $postFields)
    {
        //未做curl扩展验证
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        
        //以下2项为取消SSL证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $reponse = curl_exec($ch);
        curl_close($ch);
        
        return $reponse; 
    }
    
}

?>
