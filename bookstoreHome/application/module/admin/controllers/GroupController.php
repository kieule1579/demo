<?php
class GroupController extends Controller
{

     //===== CONSTRUCT ======
     public function __construct($arrParams)
     {
          parent::__construct($arrParams);
          $this->_templateObj->setFolderTemplate('admin/main/');
          $this->_templateObj->setFileTemplate('index.php');
          $this->_templateObj->setFileConfig('template.ini');
          $this->_templateObj->load();
     }

     //===== LOGIN ======
     // public function loginAction(){
     //      $this->_view->setTitles('Login');      
     //      $this->_view->appendCss(['user/css/abc.css']);      
     //      $this->_view->appendJs(['user/js/test.js']);      
     //      $this->_view->render('user/login');
     // }

     //===== LOGOUT ======
     // public function logoutAction(){   
     //      $this->_view->setTitles('Logout');      
     //      $this->_view->appendJs(['user/js/test.js']);      
     //      $this->_view->render('user/logout');
     // }

     //Hien thi danh sach group
     public function indexAction()
     {
          $this->_view->_title = 'User Manager :: User Group';
          $this->_view->Items  = $this->_model->listItem($this->_arrParam, null);
          $this->_view->render('group/index');
     }

     //Them group
     public function addAction()
     {
          $this->_view->_title = 'User Manager :: User Group: Add';
          $this->_view->render('group/add');
     }

     //ajax status
     public function ajaxStatusAction()
     {
          $result = $this->_model->changeStatus($this->_arrParam, ['task'=>'change-ajax-status']);
          echo json_encode($result); 
     }

     //ajax GROUP_ACP
     public function ajaxGroupACPAction()
     {
          $result = $this->_model->changeStatus($this->_arrParam, ['task'=>'change-ajax-group-acp']);
          echo json_encode($result); 
     }
}
