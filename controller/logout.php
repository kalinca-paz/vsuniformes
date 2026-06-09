<?php
session_start();

session_unset(); // remove as variáveis da sessão
session_destroy(); // destrói a sessão

header("Location: ../index.php");
exit;
?>