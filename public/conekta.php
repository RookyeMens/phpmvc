<?php
require('../vendor/autoload.php');
require('../config/smarty_connect.php');

$smarty->assign('title','Conekta');
$smarty->assign('content','conekta.tpl');
$smarty->display('layout.tpl');
