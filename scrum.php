<?php
session_start();
//Run controller depending of the view selected. Create controller object and call controller's action.
//v - view
//a - action
switch ($_GET['v']) {
  case 'index': 
    require 'controllers/controller_index.php';
    $ob = new controller_index ();
    $ob->$_GET['a']();
    break;
  default: 
    require 'controllers/controller_index.php';
    $ob = new controller_index ();
    $ob->show();
    break;	
}

