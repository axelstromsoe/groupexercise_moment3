<?php

// Inkluderar alla klasser
spl_autoload_register(function($className) {
    include("inc/classes/$className.class.php");
});

// Aktiverar felrapportering
error_reporting(-1);
ini_set("display_errors", 1);
?>