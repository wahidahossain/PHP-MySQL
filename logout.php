<?php

session_start();



// if the user is logged in, unset the session

if (isset($_SESSION['login'])) {

    unset($_SESSION['login']);

}



// now that the user is logged out,

// go to login page

header('Location: index.php');

?>