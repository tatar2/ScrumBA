<?php
/**
 * @author Tatar <tatarzb@poczta.onet.pl>
 * @version: 0.1
 * @license http://www.gnu.org/copyleft/lesser.html
 */

/**
 * Basic class for data models
 *
 * @abstract
 */
abstract class model {

  /**
  * 
  * @var object PDO Database connection object
  */
  protected $pdo;

  /**
  * Setup database connection at object creation
  * 
  * @return void
  */
  public function  __construct() {
    require 'config/dbconfig.php';
      $this->pdo=new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}
