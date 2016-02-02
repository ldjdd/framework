<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\exception;

/**
 * Exception represents a generic exception for all purposes.
 * 
 * 所有异常类的基类,框架及应用中所有的异常类都应该直接或间接的继承此类
 *
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
class Exception extends \Exception
{
    protected $code = -100;
    
    public function __construct($message)
    {
        parent::__construct($message, $this->code);
    }
}