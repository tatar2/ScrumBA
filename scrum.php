<?php
session_start();
//Run controller depending of the view selected. Create controller object and call controller's action.
//v - view
//a - action
if (isset($_GET['v'])) {
  switch ($_GET['v']) {
    case 'index': 
      require 'controllers/controller_index.php';
      $ob = new controller_index ();
      $ob->$_GET['a']();
      break;
    case 'user':
      require 'controllers/controller_user.php';
      $ob = new controller_user ();
   	  $ob->$_GET['a']();
      break;
    case 'project':
      require 'controllers/controller_project.php';
      $ob = new controller_project ();
      $ob->$_GET['a']();
      break;
    case 'userproject':
      require 'controllers/controller_userproject.php';
      $ob = new controller_userproject ();
      $ob->$_GET['a']();
      break;
    default: 
      require 'controllers/controller_index.php';
      $ob = new controller_index ();
      $ob->show();
      break;	
  }
} else {
  header("location: scrum.php?v=index&a=show");  
}

