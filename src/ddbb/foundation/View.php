<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\foundation;

use ddbb\exception\Exception;
use ddbb\ddbb;
/**
 * View has the feature of render view.
 *
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
class View
{
    /**
     * @var string
     */
    public $viewPath;
    
    /**
     * @var string Layout file which apply to view file
     */
    public $layoutFile;
    
    /**
     * @param string $view
     * @param array $data
     * @param bool $return
     * 
     * @return void|string 
     */
    public function render($view, array $data = [], $return = false)
    {
        
    }
    
    /**
     * @param string $file
     * @param array $data
     * @param bool $return
     * 
     * @return void|string
     */
    public function renderFile($file, array $data = [], $return = false)
    {
        if(!file_exists($file))
        {
            throw new Exception(ddbb::translate("The view file '{$file}' not found!"));
        }
        
        if($this->layoutFile && !file_exists($this->layoutFile))
        {
            throw new Exception(ddbb::translate("The layout file '{$this->layoutFile}' not found!"));
        }
        
        ob_clean();
        ob_start();
        extract($data);
        include $file;
        $content = ob_get_clean();
        
        if($this->layoutFile)
        {
            include $this->layoutFile;
        }
        
        $output = ob_get_clean();
        
        if($return)
        {
            return $output;
        }
        
        echo $output;
    }
}