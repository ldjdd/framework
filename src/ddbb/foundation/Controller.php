<?php
namespace ddbb\foundation;

use ddbb\exceptions\Exception;
use ddbb\ddbb;

class Controller
{
    public function runAction($action)
    {
        $method_name = 'action'.ucfirst($action);
        
        if(!method_exists($this, $method_name))
        {
            throw new Exception(ddbb::translate('The '.$method_name.' of '.get_class($this).' not found!'));
        }
        
        $this->$method_name();
    }
}