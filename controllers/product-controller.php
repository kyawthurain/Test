<?php

require_once "../models/product.php";

class ProductController{
    // public $product = new Product();

    public function createProduct($productName,$brandId,$categoryId,$listPrice,$modelYear){
        $product = new Product();
       return  $product->insertProduct($productName,$brandId,$categoryId,$listPrice,$modelYear);
    }

    public function getAllProducts(){
        $product = new Product();
        return $product->getAllProducts();
    }

    public function getProductById($id){
        $product = new Product();
        return $product->getProductById($id);
    }

    public function softDeleteProduct($id){
        $product = new Product();
        return $product->softdeleteProduct($id);
    }

    public function updateProduct($productName,$brandId,$categoryId,$listPrice,$modelYear,$id){
        $product = new Product();
        return $product->updateProduct($productName,$brandId,$categoryId,$listPrice,$modelYear,$id);
    }
}
