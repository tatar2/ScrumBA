<?php
/**
* @author Tatar <tatarzb@poczta.onet.pl>
* @version: 0.1
* @license http://www.gnu.org/copyleft/lesser.html
*/

require 'classes/controller.php';

/**
* Controller class for user pages - login, register, index
*
* @abstract
*/

class controller_user extends controller {

  /**
  * Constructor
  * 
  * Load and create view and model objects
  * 
  * @return void
  */
  public function  __construct() {
    require 'views/view_user.php';
    require 'models/model_user.php';
    $this->view = new view_user();
    $this->model = new model_user ();
  }

  /**
  * Register action handler
  * 
  * If session active display user main page else display register page.
  * 
  * @return void
  */
  public function register() {
    if (isset($_SESSION['userid'])) {
      $this->redirect('?v=project&a=show');
    } else {
      $this->view->register();
    }
  }

  /**
  * Login action handler
  * 
  * If session active display user main page else display login page.
  * 
  * @return void
  */
  public function login() {
    if (isset($_SESSION['userid'])) {
      $this->redirect('?v=project&a=show');
    } else {
      $this->view->login();
    }
  }

  /**
  * Process login request
  * 
  * If user and password are correct setup session else display error page.
  *
  * @return void
  */
  public function dologin() {
    $password=$this->model->getpassword($_POST['username']);
    if (!empty($_POST['password']) && !empty($password) && $password[0]['userpasswd']==$_POST['password']) {
      $_SESSION['username']=$_POST['username'];
      $id=$this->model->getid($_POST['username']);
      $_SESSION['userid']=$id[0]['userid'];
      $this->redirect('?v=project&a=show');
    } else {
      $this->view->set('errormessage', "Błędny login lub hasło!");
      $this->view->set('redirectto', "?v=user&a=login");
      $this->view->render('error_view');
    }
  }

  /**
  * Logout user
  * 
  * Destroy session and display main page.
  *
  * @return void
  */
  public function logout() {
    session_destroy();
    $this->redirect('?v=index&a=show');
  }

  /**
  * Process register request
  * 
  * Try to add user to database. On success make view display info, on failure make view display error.
  *
  * @return void
  */
  public function doregister() {
    if (isset($_SESSION['userid'])) {
      $this->redirect('?v=project&a=show');
    } else {
      $useremail=$_POST['useremail'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $rpassword=$_POST['rpassword'];
      if ($password==$rpassword && !empty($useremail) && !empty($username) && $this->model->putuser($useremail,$password,$username)) {
        $this->view->set('infomessage', "Użytkownik zarejestrowany!<br>Możesz się teraz zalogować.");
        $this->view->set('redirectto', "?v=user&a=login");
        $this->view->render('info_view');
      } else {
        $this->view->set('errormessage', "Błędne dane do rejestracji!");
        $this->view->set('redirectto', "?v=user&a=register");
        $this->view->render('error_view');
      }
    }
  }
  
  /**
  * Edit action handler
  *
  * If session active display user edit page else display index (main) page.
  *
  * @return void
  */
  public function edit() {
  	if (isset($_SESSION['userid'])) {
  	  $user=$this->model->getuser($_SESSION['userid']);
  	  $this->view->set('user', $user[0]);
  	  $this->view->edit();
  	} else {
  	  $this->redirect('?v=index&a=show');
  	}
  }
  
  /**
  * Change email action handler
  *
  * If session active try to change email else display index (main) page.
  *
  * @return void
  */
  public function doemail() {
  	if (isset($_SESSION['userid'])) {
  	  if (isset($_POST['useremail'])) {
  	  	if ($this->model->putemail($_SESSION['userid'],$_POST['useremail'])) {
  	  	  $this->view->set('infomessage', "Adres email został zmieniony."); 
  	  	  $this->view->set('redirectto', "?v=project&a=show");
  	  	  $this->view->render('info_view');
  	  	} else {
  	  	  $this->view->set('errormessage', "Nieudana zmiana adresu email.");
  	      $this->view->set('redirectto', "?v=user&a=edit");
  	  	  $this->view->render('error_view');
  	  	}
  	  } else {
  	  	$this->view->set('errormessage', "Błędny adres email.");
  	  	$this->view->set('redirectto', "?v=user&a=edit");
  	  	$this->view->render('error_view');
  	  }
  	} else {
  	  $this->redirect('?v=index&a=show');
  	}
  }
  
  /**
  * Change email action handler
  *
  * If session active try to change email else display index (main) page.
  *
  * @return void
  */
  public function dopassword() {
  	if (isset($_SESSION['userid'])) {
  	  $password=$this->model->getpassword($_SESSION['username']);
  	  if (!empty($_POST['password']) && !empty($password) && $password[0]['userpasswd']==$_POST['password'] && !empty($_POST['npassword']) && $_POST['npassword']==$_POST['rpassword']) {
        if ($this->model->putpassword($_SESSION['userid'], $_POST['npassword'])) {
          $this->view->set('infomessage', "Hasło zostało zmienione.");
          $this->view->set('redirectto', "?v=project&a=show");
          $this->view->render('info_view');
        } else {
          $this->view->set('errormessage', "Nieudana zmiana hasła.");
          $this->view->set('redirectto', "?v=user&a=edit");
          $this->view->render('error_view');
  		}
      } else {
        $this->view->set('errormessage', "Błędne hasło.");
        $this->view->set('redirectto', "?v=user&a=edit");
        $this->view->render('error_view');
      }
  	} else {
      $this->redirect('?v=index&a=show');
  	}
  }
}
