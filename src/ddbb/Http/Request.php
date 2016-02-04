<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */
namespace ddbb\http;

use ddbb\foundation\Component;
use ddbb\tools\DynamicCast;

/**
 * Request helps us to get http request data.
 *
 * 提供了HTTP请求信息的获取操作方法
 *
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
class Request extends Component
{
    /**
     * Sets $value to $_REQUEST[$name], $_GET[$name] and $_POST[$name]
     *  
     * @param string $name
     * @param string $value
     * 
     * @return void
     */
    public function setParam($name, $value)
    {
        $_REQUEST[$name] = $_GET[$name] = $_POST[$name] = $value;
    }
    
    /**
     * Gets value from $_REQUEST by name.
     * 
     * @param string $name The name of request
     * @param string $default Returns the default value if the value by the user transmit  is empty
     * @param string $cast Expects type of the value by the user transmit, the return value's type will be 
     * convertions to the type by $cast transmit
     * 
     * @return mixed
     */
    public function getParam($name, $default = null, $cast = null)
    {
        $value = null;
        
        if(isset($_REQUEST[$name])) $value = $_REQUEST[$name];
        if(empty($value)) $value = $default;
        if($cast) $value = DynamicCast::cast($value, $cast);
        return $value;
    }
    
    /**
     * Gets value from $_GET by name.
     *
     * @param string $name The name of request
     * @param string $default Returns the default value if the value by the user transmit  is empty
     * @param string $cast Expects type of the value by the user transmit, the return value's type will be 
     * convertions to the type by $cast transmit
     * 
     * @return mixed
     */
    public function getQuery($name, $default = null, $cast = null)
    {
        $value = null;
        
        if(isset($_GET[$name])) $value = $_GET[$name];
        if(empty($value)) $value = $default;
        if($cast) $value = DynamicCast::cast($value, $cast);
        
        return $value;
    }
    
    /**
     * Gets value from $_REQUEST by name.
     *
     * @param string $name The name of request
     * @param string $default Returns the default value if the value by the user transmit  is empty
     * @param string $cast Expects type of the value by the user transmit, the return value's type will be 
     * convertions to the type by $cast transmit
     * 
     * @return mixed
     */
    public function getPost($name, $default = null, $cast = null)
    {
        $value = null;
        
        if(isset($_POST[$name])) $value = $_POST[$name];
        if(empty($value)) $value = $default;
        if($cast) $value = DynamicCast::cast($value, $cast);
        
        return $value;
    }
    
    /**
     * Returns the user IP address.
     * @return string user IP address. Null is returned if the user IP address cannot be detected.
     */
    public function getIP()
    {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
    }
    
    /**
     * Returns the user host name, null if it cannot be determined.
     * @return string user host name, null if cannot be determined
     */
    public function getHost()
    {
        return isset($_SERVER['REMOTE_HOST']) ? $_SERVER['REMOTE_HOST'] : null;
    }
}