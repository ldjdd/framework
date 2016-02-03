<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb;

use ddbb\foundation\Application;
class ddbb
{
    /**
     * @var ddbb\foundation\Application
     */
    public static $app = null;
    
    public static function createApp($basePath)
    {
        if(self::$app == null)
        {
        	self::$app = new Application($basePath);
        }
        return self::$app;
    }
    
    public static function translate($message)
    {
        return $message;
    }
}