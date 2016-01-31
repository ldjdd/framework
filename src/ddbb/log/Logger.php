<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\log;

use ddbb\foundation\Component;

class Logger extends Component 
{
    const TRACE = 100;
    
	/**
	 * 
	 * @param string $messge The log message
	 * @param string $category The log category
	 * @param array $context The context data
	 */
	public function trace($message, $category, array $context = [])
	{
	    $this->addLog(self::TRACE, $message, $category, $context);
	}

	/**
	 * 
	 * @param $level The log level
	 * @param $message The log message
	 * @param $category The log category
	 * @param $context The context data
	 */
	public function addLog($level, $message, $category, array $context = [])
	{
	    
	}
}