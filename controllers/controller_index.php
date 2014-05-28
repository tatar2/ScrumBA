<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

require 'classes/controller.php';

/**
* Controller for index (main) page
*
* @abstract
*/
class controller_index extends controller {

  /**
  * Constructor
  * 
  * @param void
  * @return void
  */
  public function  __construct() {
    require 'views/view_index.php';
    $this->view = new view_index ();
  }

  /**
  * Show action handler
  * 
  * @param void
  * @return void
  */
  public function show() {
    if (isset($_SESSION['userid'])) {
      $this->redirect('?v=projects&a=show');
    } else {
      $this->view->show();
    }
  }
}
