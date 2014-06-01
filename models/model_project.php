<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

require 'classes/model.php';

/**
* Class for project data model
*
* @abstract
*/
class model_project extends model {

  /**
  * Get list of projects where user participates
  *
  * @param string $userid
  * @return array
  */
  public function getprojects ($userid) {
    $data=array();
    $query=$this->pdo->prepare('select * from projects where userid=:userid or projectid in (select projectid from usersprojects where userid=:userid)');
    $query->bindValue(':userid', $userid, PDO::PARAM_STR);
    if ($query->execute()) {
      while ($row = $query->fetch()) {
        $data[]=$row;
      }
    }
    return $data;
  }
  
  /**
  * Insert project data into database
  *
  * @param string $userid 
  * @param string $projectname
  * @param string $projectdesc
  * @return bool
  */
  public function putproject ($userid, $projectname, $projectdesc) {
    $insert=$this->pdo->prepare('insert into projects (projectname, projectdesc, userid) values (:projectname, :projectdesc, :userid)');
    $insert->bindValue (':projectname', $projectname, PDO::PARAM_STR);
    $insert->bindValue (':projectdesc', $projectdesc, PDO::PARAM_STR);
    $insert->bindValue (':userid', $userid, PDO::PARAM_STR);
    return $insert->execute ();
  }
}

