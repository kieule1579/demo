<?php
class Controller
{
    protected $_view;
    protected $_model;
    protected $_templateObj;
    protected $_arrParam; //params (GET-POST)

    //CONSTRUCT
    public function __construct($arrParams)
    {
        $this->setModel($arrParams['module'], $arrParams['controller']);
        $this->setTemplate($this);
        $this->setView($arrParams['module']);
        $this->setParams($arrParams);
        $this->_view->arrParam = $arrParams;
    }

    //SET MODEL
    public function setModel($moduleName, $modelName)
    {
        $modelName = ucfirst($modelName) . 'Model';
        $path = MODULE_PATH . $moduleName . DS . 'models' . DS . $modelName . '.php';
        if (file_exists($path)) {
            require_once $path;
            $this->_model = new $modelName();
        }
    }

    //GET MODEL
    public function getModel()
    {
        return $this->_model;
    }

    //SET VIEW
    public function setView($modelName)
    {
        $this->_view = new View($modelName);
    }

    //GET VIEW
    public function getView()
    {
        return $this->_view;
    }

    //SET TEMPLATE
    public function setTemplate()
    {
        $this->_templateObj = new Template($this);
    }

    //GET Template
    public function getTemplate()
    {
        return $this->_templateObj;
    }

    //SET Params
    public function setParams($arrParam)
    {
        $this->_arrParam = $arrParam;
    }

    //GET Template
    public function getParams()
    {
        return $this->_arrParam;
    }
}
