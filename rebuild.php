<?php
	# The next time someone attempts to edit
	# this file I will personally string him
	# up from his own fucking intestines!
	# olololol
	ini_set("log_errors", 1);
	ini_set("error_log", "./php-error.log");
	
	require_once "./_builder/rebuildAll.php";
    rebuildAll();
    echo "Complete.";
?>
