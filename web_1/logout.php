<?php 
require_once "conn.php"; 
session_start();
if (isset($_SESSION["user"])){
    unset($_SESSION["user"]);
};
header('Location: index.php');

?>