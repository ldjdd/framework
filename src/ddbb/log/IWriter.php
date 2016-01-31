<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\log;

/**
 * Log writer interface.
 *
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
interface IWriter
{
    public function write($message);
    public function flush();
}