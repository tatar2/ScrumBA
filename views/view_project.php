<?php
/**
 * @author Tatar <tatarzb@poczta.onet.pl>
 * @version: 0.1
 * @license http://www.gnu.org/copyleft/lesser.html
 */

require 'classes/view.php';

/**
 * View class for project pages - displaying and modifying
 *
 * @abstract
 */

class view_project extends view {

  /**
  * Display project view main page
  * 
  * @return void
  */
  public function show() {
    $this->render('project_show');
  }
  
  /**
  * Display project add page
  *
  * @return void
  */
  public function add() {
  	$this->render('project_add');
  }
}
