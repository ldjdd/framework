<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\Foundation;

use ddbb\Exception\InvalidCallException;
use ddbb\Exception\UnknownPropertyException;

/**
 * 所有类的基类, 提供最最基础的一些功能支持
 * 例如提供魔术方法__get()、__set()的支持
 * @author ldj
 */
class Base
{
    /**
     * 动态访问属性.
     *
     * @param  string  $key
     * @return mixed
     * 
     * @throws InvalidCallException
     * @throws UnknownPropertyException
     */
    public function __get($key)
    {
        $method_name = 'get'.ucfirst($key);
        
        if(method_exists($this, $method_name) && is_callable(array($this, $method_name)))
        {
            return $this->$method_name();
        }
        
        if (method_exists($this, 'set' . $method_name))
        {
            throw new InvalidCallException('Getting write-only property: ' . get_class($this) . '::' . $method_name);
        } 
        else 
        {
            throw new UnknownPropertyException('Getting unknown property: ' . get_class($this) . '::' . $method_name);
        }
    }
    
    /**
     * 动态设置属性.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function __set($key, $value)
    {
        $method_name = 'set'.ucfirst($key);
        
        if(method_exists($this, $method_name) && is_callable(array($this, $method_name)))
        {
            return $this->$method_name();
        }
        
        if (method_exists($this, 'get' . $method_name))
        {
            throw new InvalidCallException('Setting read-only property: ' . get_class($this) . '::' . $method_name);
        } 
        else 
        {
            throw new UnknownPropertyException('Setting unknown property: ' . get_class($this) . '::' . $method_name);
        }
    }
}