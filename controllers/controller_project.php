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
  * Show action handler
  * 
  * If session active display user main page else display index (main) page.
  * 
  * @return void
  */
  public function show() {
    if (isset($_SESSION['userid'])) {
      $this->view->show();
    } else {
      $this->redirect('?v=index&a=show');
    }
  }
}
