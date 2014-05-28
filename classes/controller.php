<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

/**
* Basic class for controllers
*
* @abstract
*/
abstract class controller {

  /**
  * 
  * @var view view object to be used by controller to display page content
  */
  protected $view;

  /**
  * 
  * @var model model object to be used by controller to access database
  */
  protected $model;

  /**
  * Redirect to URL
  *
  * @param string $url URL to redirect to
  * @return void
  */
  public function redirect($url) {
    header("location: ".$url);
  }
}
