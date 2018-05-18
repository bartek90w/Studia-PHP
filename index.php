<?php

require_once "./Controller/Controller.php";

session_start();
$kontroler = new Controller();
$referencja = &$kontroler;
$referencja->processRequest();
?>