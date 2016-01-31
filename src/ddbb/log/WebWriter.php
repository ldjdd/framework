<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\log;

/**
 * WebWriter output the messages to web frontpage.
 *
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
class WebWriter implements IWriter
{
    private $_data = [];
    
    /**
     * {@inheritDoc}
     * @see \ddbb\log\IWriter::flush()
     */
    public function flush()
    {
        
        $this->_data = [];
    }

    /**
     * {@inheritDoc}
     * @see \ddbb\log\IWriter::write()
     */
    public function write($message)
    {
        $this->_data[] = $message;
    }

}