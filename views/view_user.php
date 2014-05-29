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

class view_user extends view {

  /**
  * Register user action handler
  * 
  * @return void
  */
  public function register() {
    $this->render('user_register');
  }

  /**
  * Login user action handler
  * 
  * @return void
  */
  public function login() {
    $this->render('user_login');
  }
  
  /**
  * Edit user action handler
  *
  * @return void
  */
  public function edit() {
  	$this->render('user_edit');
  }
}
