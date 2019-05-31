<?php
ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

require('../vendor/autoload.php');
require('../config/database.php');
// require('../config/smarty_connect.php');

use Aura\Router\RouterContainer;


$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
$map->get('products', '/products', [
    'controller' => 'App\Controllers\ProductsController',
    'action' => 'getProductsAction'
]);

$map->get('addProduct', '/products/add', [
    'controller' => 'App\Controllers\ProductsController',
    'action' => 'getAddProductAction'
]);

$map->post('saveProduct', '/products/add', [
    'controller' => 'App\Controllers\ProductsController',
    'action' => 'getAddProductAction'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo 'No route';
} else {
    
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    
    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    echo $response->getBody();
} 

// use App\Entities\Product as Product;

// $products = Product::all()->jsonSerialize();

// $smarty->assign('title','Listado');
// $smarty->assign("products",$products);
// $smarty->assign('content','products.tpl');
// $smarty->display('layout.tpl');

// $route = $_GET['route']  ?? '/';

// if($route == '/'){
//     require '../index.php';
// } elseif ($route == 'products'){
//     require '../products.php';
// }


