<?php
session_start();
if($_SESSION['LoggedIn']){
    $_SESSION['LoggedIn']=false;
    header('Location: /../index.php');
}
