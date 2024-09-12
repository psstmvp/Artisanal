<?php
session_start();
if(!(isset($_SESSION['sid']) && !empty($_SESSION['sid']))){
    header("location: ../Guest/Login.php");
}