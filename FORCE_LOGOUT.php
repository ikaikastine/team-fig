<?php 
session_start();
session_destroy();
header("Location: test_page.php");
#session_destroy();
?>