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
        return trim(substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?')), '/');
    }
}