<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

require 'classes/model.php';

/**
* Class for user to project assignment data model
*
* @abstract
*/
class model_userproject extends model {

  /**
  * Get project properties
  *
  * @param string $projectid
  * @return array
  */
  public function getproject ($projectid) {
    $data=array();
    $query=$this->pdo->prepare('select * from projects where projectid=:projectid');
    $query->bindValue(':projectid', $projectid, PDO::PARAM_STR);
    if ($query->execute()) {
      while ($row = $query->fetch()) {
        $data[]=$row;
      }
    }
    return $data;
  }
  
  /**
  * Get list of users that contribute to a project
  *
  * @param string $projectid 
  * @return array
  */
  public function getuserprojects ($projectid) {
  	$data=array();
    $query=$this->pdo->prepare('select p.userid puserid, username from usersprojects p join users u using (userid) where projectid=:projectid');
    $query->bindValue(':projectid', $projectid, PDO::PARAM_STR);
    if ($query->execute()) {
      while ($row = $query->fetch()) {
        $data[]=$row;
      }
    }
    return $data;
  }
  
  /**
  * Get list of registered users that do not contribute to a project
  *
  * @param string $projectid
  * @return array
  */
  public function getusersnotinproject ($projectid) {
  	$data=array();
  	$query=$this->pdo->prepare('select * from users where user enabled is not FALSE and userid not in (select userid from usersprojects where projectid=:projectid)');
  	$query->bindValue(':projectid', $projectid, PDO::PARAM_STR);
  	if ($query->execute()) {
  		while ($row = $query->fetch()) {
  			$data[]=$row;
  		}
  	}
  	return $data;
  }
}

