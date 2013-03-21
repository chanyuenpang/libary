<?php

class rest {
    private $isDebug;
    function __construct($isDebug = false) {
        $this->isDebug = $isDebug;        
    }

    /**
     * Curl版本
     * 使用方法：
     * $post_string = "app=request&version=beta";
     * request_by_curl('http://facebook.cn/restServer.php',$post_string);
     */
    private function curl($url, $msg = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if($msg != null) curl_setopt($ch, CURLOPT_POSTFIELDS, $msg);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        
        if($this->isDebug) {
            echo ('error message : ');
            var_dump(curl_error($ch));
            echo ('<br/>HttpCode : ');
            echo (curl_getinfo($ch, CURLINFO_HTTP_CODE));
            echo ('<br/>Response : ');
            echo ($response);  
        }
        
        curl_close($ch);
        return $response;
    }
    
    public function post($url, $msg){
        return $this->curl($url, $msg);
    }
    
    public function get($url){
        return $this->curl($url);
    }
    
    public function put($url, $msg){
        $ch = curl_init();
        
        $fp = fopen('php://temp/maxmemory:256000', 'w');
        if (!$fp) {
            die('could not open temp memory data');
        }
        fwrite($fp, $msg);
        fseek($fp, 0); 
        
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PUT, true);
        curl_setopt($ch, CURLOPT_INFILE, $fp);
        curl_setopt($ch, CURLOPT_INFILESIZE, strlen($msg));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);        
        $response = curl_exec($ch);        
        fclose($fp);
        
        if($this->isDebug) {
            echo ('error message : ');
            var_dump(curl_error($ch));
            echo ('<br/>HttpCode : ');
            echo (curl_getinfo($ch, CURLINFO_HTTP_CODE));
            echo ('<br/>Response : ');
            echo ($response);  
        }
        
        curl_close($ch);        
        return $response;
    }
    
    public function patch($url, $post_string)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        
        if($this->isDebug) {
            echo ('error message : ');
            var_dump(curl_error($ch));
            echo ('<br/>HttpCode : ');
            echo (curl_getinfo($ch, CURLINFO_HTTP_CODE));
            echo ('<br/>Response : ');
            echo ($response);  
        }
        
        curl_close($ch);       
        return $response;
    }
    
    public function delete($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        
        if($this->isDebug) {
            echo ('error message : ');
            var_dump(curl_error($ch));
            echo ('<br/>HttpCode : ');
            echo (curl_getinfo($ch, CURLINFO_HTTP_CODE));
            echo ('<br/>Response : ');
            echo ($response);  
        }
        
        curl_close($ch);    
        return $response;
    }

}

