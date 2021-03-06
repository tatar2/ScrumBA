<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

require 'classes/controller.php';

/**
* Controller class for user pages - login, register, index
*
* @abstract
*/

class controller_project extends controller {

  /**
  * Constructor
  * 
  * Load and create view and model objects
  * 
  * @return void
  */
  public function  __construct() {
    require 'views/view_project.php';
    require 'models/model_project.php';
    $this->view = new view_project();
    $this->model = new model_project();
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
      $projects=$this->model->getprojects($_SESSION['userid']);
      $this->view->set('projects',$projects);
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
