<?php namespace Controllers;
use Models\Product;
use Models\Image;

class FrontController{
	public function index(){
		$product = new Product;
		$products = $product->all();
		$image = new Image;
		
		
		view("front.index", compact('products', 'image'));
	}
}