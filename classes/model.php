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
  * @var PDO Database connection object
  */
  protected $oci;

  /**
  * Setup database connection at object creation
  * 
  * @return void
  */
  public function  __construct() {
    require 'config/dbconfig.php';
    $desc = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)
                 (HOST=".$host.")(PORT=".$port."))
                 (CONNECT_DATA=(SERVICE_NAME=".$dbase.")))";
    $this->oci=oci_connect($user,$pass,$desc,'UTF8');
    if (!$this->oci) {
      $err = oci_error();
      trigger_error('Nie można nawiązać połączenia z bazą danych: '. $err['message'], E_USER_ERROR);
    }
  }

  /**
  * Close database connection at object destruction
  * 
  * @return void
  */  
  function __destruct () {
    if (!oci_close($this->oci)) {
      $err = oci_error();
      trigger_error('Problem z zamknięciem połączenia z bazą danych: '. $err['message'], E_USER_ERROR);
    }
  }

}
