<?php
namespace App\Controllers;

use App\Entities\Product;

class ProductsController extends BaseController {

    public function getProductsAction() {
        $products = Product::all()->jsonSerialize();

        return $this->renderHTML('products.twig', [
            'products' => $products
        ]);

        include '../views/products.php';
    }

    public function getAddProductAction($request) {  

        // var_dump($request->getMethod());
        // var_dump((string)$request->getBody());
        // var_dump($request->getParsedBody());

        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $product = new Product();
            $product->name = $postData['productName'];
            $product->description = $postData['productDescription'];
            $product->save();
        }

        return $this->renderHTML('addProduct.twig');
        // include '../views/addProduct.php';
    }

}