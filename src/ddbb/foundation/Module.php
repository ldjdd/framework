<?php
namespace ddbb\foundation;

class Module extends Component
{
    /**
     * @var string
     */
    protected $id;
    
    /**
     * @var string
     */
    protected $namespace;
    
    /**
     * The base path for the module installation.
     *
     * @var string
     */
    protected $basePath;
    
    /**
     * @var string Default controller's name
     */
    public $defaultController = 'default';
    
    /**
     * @var string Default action's name
     */
    public $defaultAction = 'index';
    
    /**
     * Saves components' instance
     *
     * 保存组件实例
     *
     * @var array
     */
    protected $_componentsInstance = [];
    
    /**
     * Saves conponents' configuration data
     *
     * 组件配置信息
     *
     * @var array
     */
    protected $_components = [];
    
    protected function registerCoreComponents(){}
    
    public function setComponents($value)
    {
        $this->_components = array_merge($this->_components, $value);
    }
    
    protected function getComponent($name)
    {
        if(!isset($this->_componentsInstance[$name]))
        {
            $this->_componentsInstance[$name] = $this->loadComponent($name);
        }
        return $this->_componentsInstance[$name];
    }
    
    protected function loadComponent($name)
    {
        $config = $this->_components[$name];
    
    }
}