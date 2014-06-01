<?php
/**
 * @author Tatar <tatarzb@poczta.onet.pl>
 * @version: 0.1
 * @license http://www.gnu.org/copyleft/lesser.html
 */

require 'classes/view.php';

/**
 * View class for user pages - login, register, index
 *
 * @abstract
 */

class view_userproject extends view {

  /**
  * Register user action handler
  * 
  * @return void
  */
  public function show() {
    $this->render('userproject_show');
  }
}