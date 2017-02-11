<?php

session_start();
unset ($SESSION['username']);
session_destroy();
global $privilegio;
$privilegio='';

header('Location: http://localhost/github/excelsius2/index.php');

?>
