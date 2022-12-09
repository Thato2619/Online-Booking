<?php 

# error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#add sessiion and include files and sessions
require_once __DIR__ . "/config/DBConfig.php";
require_once __DIR__ . "/data/FaceMaskDao.php";
require_once __DIR__ . "/model/FaceMask.php";

session_start();

#  add FaceMaskDao and Database objects
$dbConfig = new DBConfig();
$faceMaskDao = new FaceMaskDao($dbConfig);


























?>