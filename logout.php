<?php include "global/function.php";
setcookie("username", $_SESSION['login'], time()-1);
session_destroy();
ob_end_flush();
redir($link);
?>