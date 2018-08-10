<?php
// load Smarty library
require  dirname(__FILE__).'/../vendor/smarty/smarty/libs/Smarty.class.php';

// These automatically get set with each new instance.
$smarty = new Smarty;

$smarty->setTemplateDir( dirname(__FILE__).'/../resources/smarty/templates/' );
$smarty->setCompileDir( dirname(__FILE__).'/../resources/smarty/templates_c/' );
$smarty->setCacheDir( dirname(__FILE__).'/../resources/smarty/cache/' );
$smarty->setConfigDir( dirname(__FILE__).'/../resources/smarty/config/' );

// $smarty->testInstall();
$smarty->assign('app_name', 'Intranet');

?>