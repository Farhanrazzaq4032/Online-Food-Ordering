<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit(0);
}
else
{
    if ($_SESSION['auth'] == "0") {

    }
    elseif ($_SESSION['auth'] == "1") {

    }
    elseif ($_SESSION['auth'] == "2") {

    }
    elseif ($_SESSION['auth'] == "3") {
    }
    
}

?>