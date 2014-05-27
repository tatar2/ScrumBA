<?php
/**
 * @author Tatar <tatarzb@poczta.onet.pl>
 * @version: 0.1
 * @license http://www.gnu.org/copyleft/lesser.html
 */

/**
 * Basic class for views
 *
 * @abstract
 */

abstract class view {
	
  /**
  * Render a page
  *
  * @param string $name name of a template to render
  * @return void
  */
  public function render($name) {
    $this->set('view', $name);
    $path='templates/page.html.php';
    if (is_file($path)) {
      require $path;
    } else {
      require 'templates/default.html.php';
    }	
  }

  /**
  * Get include path for page part in current view
  *
  * @param string $name page part name
  * @return string path 
  */
  public function getinclude ($part) {
    $path='templates/'.$this->get('view').'.'.$part.'.html.php';
    if (is_file($path)) {
      return $path;
    } else {
      $path='templates/default.'.$part.'.html.php';
      if (is_file($path)) {
        return $path;
      } else {
        return 'templates/empty.html.php';
      }
    }	
  }

  /**
  * Set variable name to value
  *
  * @param string $name name of a variable
  * @param string $value value to be assigned
  * @return void
  */
  public function set($name, $value) {
    $this->$name=$value;
  }

  /**
  * Get value of variable name
  *
  * @param string $name name of a variable
  * @return string value of variable name
  */
  public function get($name) {
    if (!isset($this->$name)) { 
      return NULL; 
    } else {
      return $this->$name;
    }
  }

}
