<?php

/*
 * To change this template, choose Tools | Templates
 */

class infoVersionRequest
{
    public function getAppParams()
    {
        $apiParams = array();
        
        return $apiParams;
    }
    
    /*
     * 获取API访问地址
     */
    function getServerUrl()
    {
        return "https://dnsapi.cn/Info.Version";
    }
}

?>
