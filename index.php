<?php
   //Inizializzo la sessione
   session_start();

  // Control action commands
  if (!isset($_GET['action']))
    $action = 0;
  else $action = $_GET['action'];
  
  
  // Do requested action
  require('nFunction.php');
  
  doAction($action);
  

?>