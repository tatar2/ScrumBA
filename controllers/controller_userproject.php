<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

require 'classes/controller.php';

/**
* Controller class for user to project assignment
*
* @abstract
*/

class controller_userproject extends controller {

  /**
  * Constructor
  * 
  * Load and create view and model objects
  * 
  * @return void
  */
  public function  __construct() {
    require 'views/view_userproject.php';
    require 'models/model_userproject.php';
    $this->view = new view_userproject();
    $this->model = new model_userproject();
  }

  /**
  * Show project users page display action handler
  * 
  * If session active display project page else display index (main) page.
  * 
  * @return void
  */
  public function show() {
    if (isset($_SESSION['userid'])) {
      $project=$this->model->getproject($_GET['p']);
      $this->view->set('project',$project[0]);
      $usersprojects=$this->model->getusersprojects($_GET['p']);
      $this->view->set('usersprojects',$usersprojects);
      $this->view->show();
    } else {
      $this->redirect('?v=index&a=show');
    }
  }
  
  /**
  * Add project users page display action handler
  *
  * If session active display add project users page else display index (main) page.
  *
  * @return void
  */
  public function addusers() {
  	if (isset($_SESSION['userid'])) {
  		$notusers=$this->model->getnotusersprojects($_GET['p']);
  		$this->view->set('users',$notusers);
  		$project=$this->model->getproject($_GET['p']);
        $this->view->set('project',$project[0]);
  		$this->view->addusers();
  	} else {
  		$this->redirect('?v=index&a=show');
  	}
  }
  
  /**
  * Add users to project action handler
  *
  * If session active add users to project else display index (main) page.
  *
  * @return void
  */
  public function doaddusers() {
  	if (isset($_SESSION['userid'])) {
  		if (isset($_POST['userid']) && isset($_POST['projectid'])){
  			foreach ($_POST['userid'] as $userid) {
  				$this->model->putuserproject($userid, $_POST['projectid']);
  			}
  		}
  		$this->redirect('?v=userproject&a=show&p='.$_POST['projectid']);
  	} else {
  		$this->redirect('?v=index&a=show');
  	}
  }
  
  /**
  * remove project users page display action handler
  *
  * If session active display add project users page else display index (main) page.
  *
  * @return void
  */
  public function removeusers() {
  	if (isset($_SESSION['userid'])) {
  		$users=$this->model->getusersprojects($_GET['p']);
  		$this->view->set('users',$users);
  		$project=$this->model->getproject($_GET['p']);
  		$this->view->set('project',$project[0]);
  		$this->view->removeusers();
  	} else {
  		$this->redirect('?v=index&a=show');
  	}
  }
  
  /**
  * Remove users from project action handler
  *
  * If session active add users to project else display index (main) page.
  *
  * @return void
  */
  public function doremoveusers() {
  	if (isset($_SESSION['userid'])) {
  		if (isset($_POST['userid']) && isset($_POST['projectid'])){
  			foreach ($_POST['userid'] as $userid) {
  				$this->model->deleteuserproject($userid, $_POST['projectid']);
  			}
  		}
  		$this->redirect('?v=userproject&a=show&p='.$_POST['projectid']);
  	} else {
  		$this->redirect('?v=index&a=show');
  	}
  }
}
