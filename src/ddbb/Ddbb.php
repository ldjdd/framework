<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace dbdb;

class Ddbb
{
    /**
     * @var ddbb\Foundation\Application
     */
    public static $app = null;
    
    public static function createApp()
    {
        if(self::$app == null)
        {
        	
        }
        return self::$app;
    }
}