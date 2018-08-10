<?php
require('../vendor/autoload.php');
require('../config/database.php');
require('../config/smarty_connect.php');

use App\Entities\Product as Product;

$products = Product::all()->jsonSerialize();

$smarty->assign('title','Listado');
$smarty->assign("products",$products);
$smarty->assign('content','products.tpl');
$smarty->display('layout.tpl');
