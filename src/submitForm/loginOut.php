<?php
session_start();
if ($_SESSION['LoggedIn']) {
    $_SESSION['LoggedIn'] = false;
    $_SESSION['rule'] = false;
    header('Location: /../index.php');
}
