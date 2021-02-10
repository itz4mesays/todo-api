<?php

namespace common\components;
use Yii;
use yii\base\Component;

class ApiConfiguration extends Component
{
    
    public function setHeader($status)
    {
      
      $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
      $content_type ="application/json; charset=utf-8";

      header($status_header);
      header('Content-type: ' . $content_type);
    }


    public function _getStatusCodeMessage($status)
    {
      $codes = [
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Validation failed',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        600 => 'Custom error'
      ];

      return (isset($codes[$status])) ? $codes[$status] : '';
    } 

    public function returnedData($code, $error, $responseMessage)
    {
      $this->setHeader($code);

      $data = [
          'payload' => [
              'code' => $code,
              'error' => $error,
              'result' => $responseMessage
          ],
      ];

      return $data;
    }

    public function getBaseUrlLink()
    {
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
          $url = "https"; 
      else
          $url = "http"; 
        
      // Here append the common URL characters. 
      $url .= "://"; 
        
      // Append the host(domain name, ip) to the URL. 
      $url .= $_SERVER['HTTP_HOST']; 
        
      // Append the requested resource location to the URL 
      // $url .= $_SERVER['REQUEST_URI']; 
            
      // Print the full url 
      return $url; 
    }
       
}




