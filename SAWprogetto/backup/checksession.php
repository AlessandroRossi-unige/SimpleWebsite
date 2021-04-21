<?php
    session_start();
    if(!isset($_SESSION["newSession"])){
        echo "INVALID PERMISSION";
        exit;
    }
?>