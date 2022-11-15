<?php

ob_start(); //redirect to index page when login is incorrect.
session_start();
$current_page = htmlspecialchars($_SERVER['PHP_SELF']);

?>