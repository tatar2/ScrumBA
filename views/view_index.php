<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

require 'classes/view.php';

/**
 * View for index (main) page
 *
 * @abstract
 */

class view_index extends view {

  /**
  * Show index action handler
  *
  * @return void
  */
  public function show() {
    $this->render('index_show');
  }
}