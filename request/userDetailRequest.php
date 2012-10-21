<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class userDetailRequest
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
        return "https://dnsapi.cn/User.Detail";
    }
}
?>
