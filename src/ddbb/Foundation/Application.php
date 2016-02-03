<?php
/**
 * @link http://www.ddbbbook.com/
 * @copyright Copyright (c) 2016 ddbb Software LLC
 * @license http://www.ddbbbook.com/license/
 */

namespace ddbb\foundation;

/**
 * Application is the base class for all application classes.
 * 
 * @author ldj <ldjbenben@sina.com>
 * @since 1.0
 */
class Application extends Module
{
    /**
     * The Ddbb framework vertion.
     * 
     * 框架版本号
     * 
     * @var string
     */
    CONST VERSION = '1.0.0';
    
    /**
     * @var string
     */
    protected $id = 'application';
    
    /**
     * @var string
     */
    protected $namespace = 'application';
    
    /**
     * @var array
     */
    protected $modules = [];
	
	public function __construct($basePath)
	{
	    $this->setBasePath($basePath);
	}
	
    public function run()
    {
        $this->loadApplicationConfig();
        $this->registerCoreComponents();
        $this->route();
    }
    
    protected function route()
    {
        $path = $this->getComponent('urlAnalizer')->analize($this->getRequest());
        echo 'path:'.$path;exit();
        $module = $this;
        $arr = explode('/', $path);
        
        if(!empty($path) && !empty($arr) && array_key_exists($arr[0], $this->modules))
        {
            $module = $this->loadModule($arr[0]);
            array_pop($arr);
        }
        
        $controllerId = '';
        
        if(empty($arr) || empty($arr[0]))
        {
            $controllerId = $module->defaultController;
        }
        else
        {
            $controllerId = $arr[0];
            array_pop($arr);
        }
        
        $controllerObj = $module->loadController($controllerId);
        
        $action = '';
        
        if(!empty($arr))
        {
            $action = $arr[0];
            array_pop($arr);
        }
        
        if(!empty($arr))
        {
            $request = $this->getRequest();
            foreach ($arr as $key=>$value)
            {
                $request->setParam($key, $value);
            }
        }
        
        $controllerObj->runAction($action);
    }
    
    private function loadApplicationConfig()
    {
        $config_file = $this->getBasePath().'/config/app.php';
        if(file_exists($config_file))
        {
            $config = require $config_file;
            foreach ($config as $key => $value)
            {
                $this->__set($key, $value);
            }
        }
    }
    
    protected function registerCoreComponents()
    {
        parent::registerCoreComponents();
        
        $this->_components = array_merge($this->_components, [
            'request' => [
                'class'=>'ddbb\http\Request',
            ],
            'urlAnalizer' => [
                'class'=>'ddbb\http\UrlAnalizer',
            ]
        ]);
    }
    
    /**
     * Loads module object by id
     * 
     * @param string $id The id of module
     */
    protected function loadModule($id)
    {
        
    }
    
    /**
     * @return the $basePath
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
    }
    
    /**
     * @return \ddbb\http\Request
     */
    public function getRequest()
    {
        return $this->getComponent('request');
    }
    
}