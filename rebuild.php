<?php
        
        require_once "./config.php";
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="System Internal"');
            header('HTTP/1.0 401 Unauthorized');
            echo '<h1>401 Authorization Required</h1>';
            exit;
        } else if($_SERVER['PHP_AUTH_USER']==$passwd) {
            ini_set("log_errors", 1);
            ini_set("error_log", "./php-error.log");
            require_once "./_builder/rebuildAll.php";
            rebuildAll();
            if($passwd=='rebuild')
                echo "Warning, you are using the default rebuild password. It is recommended to change it. You can change it in config.php .<p>";
            echo "Complete.";
        } else {
            header('WWW-Authenticate: Basic realm="System Internal"');
            header('HTTP/1.0 401 Unauthorized');
            echo '<h1>403 Forbidden</h1>';
            exit;
        }
?>