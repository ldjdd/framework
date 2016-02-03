<?php
namespace ddbb\http;

use ddbb\foundation\Component;

class UrlAnalizer extends Component
{
    /**
     * Gets the request path formmater pass by analizes the request object  
     * @param Request $request
     */
    public function analize(Request $request)
    {
        $path = '';
        $pos = strpos($_SERVER['REQUEST_URI'], '?');
        
        if($pos === false)
        {
            $path = $_SERVER['REQUEST_URI'];
        }
        else
        {
            $path = substr($_SERVER['REQUEST_URI'], 0, $pos);
        }
        
        if(strpos($path, $_SERVER['SCRIPT_NAME']) === 0)
        {
            $path = substr($path, strlen($_SERVER['SCRIPT_NAME']));
        }
        
        return trim($path, '/ ');
    }
}