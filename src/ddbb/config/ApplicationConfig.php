<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\config;

/**
 * ApplicationConfig provides methods for.
 * 
 * ApplicationConfig类提供了设置和读取应用程序键值对配置文件的方法
 * 
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
class ApplicationConfig
{
    protected $_config = [];
    
    public function __construct($config)
    {
        foreach ($config as $key=>$value)
        {
            $this->__set($key, $value);
        }
    }
    
    /**
     * 设置运行环境,可选的值有production,development
     * @param string $value
     */
    public function setEnv($value)
    {
        if($value != 'development')
        {
            $value = 'production';
        }
        
        define('APP_ENV', $value);
    }
    
    /**
     * 设置是否开启debug模式
     * @param bool $value
     */
    public function setDebug($value)
    {
        define('APP_DEBUG', $value);
    }
    
    public function setComponents($config)
    {
        
    }
}