<?php
class Template
{
    //File config (admin/main/template.ini)
    private $_fileConfig;

    //File template (admin/main/index.php)
    private $_fileTemplate;

    //folder template (admin/main/)
    private $_folderTemplate;

    //controller object
    private $_controller;


    public function __construct($controller)
    {
        $this->_controller = $controller;
    }
    
    public function load()
    {
        $fileConfig     = $this->getFileConfig();
        $folderTemplate = $this->getFolderTemplate();
        $fileTemplate   = $this->getFileTemplate();

        $pathFileConfig = TEMPLATE_PATH . $folderTemplate . $fileConfig;
        if (file_exists($pathFileConfig)) {
            $arrConfig = parse_ini_file($pathFileConfig);
            $view = $this->_controller->getView();
            
            $view->_title    = $view->createTitles($arrConfig['title']);
            $view->_metaHTTP = $view->createMeta($arrConfig['metaHTTP'], 'http-equiv');
            $view->_metaName = $view->createMeta($arrConfig['metaName'], 'name');
            $view->_cssFiles = $view->createLink($this->_folderTemplate . $arrConfig['dirCss'], $arrConfig['fileCss'], 'css');
            $view->_jsFiles  = $view->createLink($this->_folderTemplate . $arrConfig['dirJs'], $arrConfig['fileJs'], 'js');
            $view->_dirImg   = $arrConfig['dirImg'];
            $view->setTemplatePath(TEMPLATE_PATH . $folderTemplate . $fileTemplate);
        }
    }

    public function setFileTemplate($value = 'index.php')
    {
        $this->_fileTemplate = $value;
    }

    public function getFileTemplate()
    {
        return $this->_fileTemplate;
    }

    public function setFileConfig($value = 'template.ini')
    {
        $this->_fileConfig = $value;
    }

    public function getFileConfig()
    {
        return $this->_fileConfig;
    }

    public function setFolderTemplate($value = 'default/main')
    {
        $this->_folderTemplate = $value;
    }

    public function getFolderTemplate()
    {
        return $this->_folderTemplate;
    }
}
