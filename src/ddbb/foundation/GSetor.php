<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\foundation;

use ddbb\exception\InvalidCallException;
use ddbb\exception\UnknownPropertyException;
/**
 * 提供了通过覆盖魔术方法来实现获取和设置对象属性的功能.
 * 有利于实现类的封装性.
 *
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
trait GSetor 
{
    /**
     * Overides magic method.
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
     * Overides magic method.
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