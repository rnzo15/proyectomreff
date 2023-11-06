<?php
session_start();
session_destroy();
header('Location: ../src/view/login.php');
exit();
?>
