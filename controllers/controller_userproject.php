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
  * Show project action handler
  * 
  * If session active display user main page else display index (main) page.
  * 
  * @return void
  */
  public function show() {
    if (isset($_SESSION['userid'])) {
      $project=$this->model->getproject($_GET['p']);
      $this->view->set('project',$project[0]);
      $usersprojects=$this->model->getuserprojects($_GET['p']);
      $this->view->set('usersprojects',$usersprojects);
      $this->view->show();
    } else {
      $this->redirect('?v=index&a=show');
    }
  }
  
  /**
  * Add project action handler
  *
  * If session active display add project page else display index (main) page.
  *
  * @return void
  */
  public function add() {
  	if (isset($_SESSION['userid'])) {
  		$this->view->add();
  	} else {
  		$this->redirect('?v=index&a=show');
  	}
  }
  
  /**
  * Add project action handler
  *
  * If session active display add project page else display index (main) page.
  *
  * @return void
  */
  public function doadd() {
  	if (isset($_SESSION['userid'])) {
  		if (isset($_POST['projectname']) && isset($_POST['projectdesc'])){
  			if ($this->model->putproject($_SESSION['userid'],$_POST['projectname'],$_POST['projectdesc'])){
  				$this->view->set('infomessage', "Projekt został utworzony.");
  				$this->view->set('redirectto', "?v=project&a=show");
  				$this->view->render('info_view');
  			} else {
  				$this->view->set('errormessage', "Projekt nie został utworzony.");
  				$this->view->set('redirectto', "?v=project&a=show");
  				$this->view->render('error_view');
  			}
  		}
  	} else {
  		$this->redirect('?v=index&a=show');
  	}
  }
}
