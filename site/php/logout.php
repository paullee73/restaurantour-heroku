<?
session_start();
session_unset();
session_destroy();

header("Location: http://localhost/site/index.html");
exit();
?>