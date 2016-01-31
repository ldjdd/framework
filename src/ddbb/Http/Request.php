<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */
namespace ddbb\http;

use ddbb\foundation\Component;

/**
 * Request helps us to get http request data.
 *
 * 提供了HTTP请求信息的获取操作方法
 *
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
class Request extends Component 
{
    /**
     * Returns the user IP address.
     * @return string user IP address. Null is returned if the user IP address cannot be detected.
     */
    public function getIP()
    {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
    }
    
    /**
     * Returns the user host name, null if it cannot be determined.
     * @return string user host name, null if cannot be determined
     */
    public function getHost()
    {
        return isset($_SERVER['REMOTE_HOST']) ? $_SERVER['REMOTE_HOST'] : null;
    }
}