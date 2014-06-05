<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

require 'classes/model.php';

/**
* Class for user data model
*
* @abstract
*/
class model_user extends model {

  /**
  * Get password for given user
  *
  * @param string $username username
  * @return string
  */
  public function getpassword ($username) {
    $data=array();
    $query=$this->pdo->prepare('select userpasswd from users where username=:username');
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    if ($query->execute()) {
      while ($row = $query->fetch()) {
        $data[]=$row;
      }
    }
    return $data;
  }
  
  /**
  * Get id for given user
  *
  * @param string $username
  * @return array
  */
  public function getid ($username) {
    $data=array();
    $query=$this->pdo->prepare('select userid from users where username=:username');
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    if ($query->execute()) {
      while ($row = $query->fetch()) {
        $data[]=$row;
      }
    }
    return $data;
  }

  /**
  * Insert user data into database
  *
  * @param string $email user email
  * @param string $password user password
  * @param string $name user name
  * @return bool
  */
  public function putuser ($email,$password,$name) {
    $insert=$this->pdo->prepare('insert into users (userpasswd,useremail,username,userenabled) values (:password, :email, :name, TRUE)');
    $insert->bindValue (':password', $password, PDO::PARAM_STR);
    $insert->bindValue (':email', $email, PDO::PARAM_STR);
    $insert->bindValue (':name', $name, PDO::PARAM_STR);
    return $insert->execute ();
  }
  
  /**
  * Get user data
  * 
  * Get user data for given userid
  * 
  * @param string $userid
  * @return array
  */
  public function getuser ($userid) {
  	$data=array();
  	$query=$this->pdo->prepare('select * from users where userid=:userid');
  	$query->bindValue(':userid', $userid, PDO::PARAM_STR);
  	if ($query->execute()) {
  		while ($row = $query->fetch()) {
  			$data[]=$row;
  		}
  	}
  	return $data;
  }
  
  /**
  * Update user email
  *
  * @param string $userid
  * @param string $email
  * @return array
  */
  public function putemail ($userid, $email) {
  	$data=array();
  	$update=$this->pdo->prepare('update users set useremail=:email where userid=:userid');
  	$update->bindValue(':userid', $userid, PDO::PARAM_STR);
  	$update->bindValue(':email', $email, PDO::PARAM_STR);
  	return $update->execute();
  }
  
  /**
  * Update user passwd
  *
  * @param string $userid
  * @param string $passwd
  * @return array
  */
  public function putpassword ($userid, $passwd) {
  	$data=array();
  	$update=$this->pdo->prepare('update users set userpasswd=:passwd where userid=:userid');
  	$update->bindValue(':userid', $userid, PDO::PARAM_STR);
  	$update->bindValue(':passwd', $passwd, PDO::PARAM_STR);
  	return $update->execute();
  }
}

