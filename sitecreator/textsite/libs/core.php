<?php
include 'object.php';
include 'controller.php';
include 'component.php';
include 'cache.php';
include 'helper.php';
include 'exceptionHandling.php';
include 'sammy.php';
include 'router.php';
include THEME_PATH . '_config/routes.php';
$sammy->run();
