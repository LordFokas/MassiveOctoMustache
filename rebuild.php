<?php
	ini_set("log_errors", 1);
	ini_set("error_log", "./php-error.log");
	require_once "./_builder/rebuildAll.php";
	rebuildAll();
?>