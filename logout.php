<?php

session_start();
/**
 * memanggil session untuk dihapus agar logout
 */
$_SESSION = [];
//menghapus cookie untuk logoout logout
session_unset();
session_destroy();

setcookie('login','true', time() - 3600);

header("Location:index.php");
/**
 * keluar dari proses
 */
exit;

?>