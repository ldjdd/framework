<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\Foundation;

use ddbb\Foundation\Base;

/**
 * Application is the base class for all application classes.
 * 
 * 
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
class Application extends Base
{
	/**
	 * The base path for the Ddbb installation.
	 * 
	 * Ddbb所在目录
	 *
	 * @var string
	 */
	public $basePath;
	
    public function run()
    {
        
    }
}