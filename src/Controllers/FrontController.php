<?php namespace Controllers;
use Models\Product;
use Models\Image;
use Models\Tags;
use Cart\SessionStorage;
use Cart\Cart;

class FrontController{
	private $cart;

	public function __construct(){
		$this->cart = new Cart(new SessionStorage('starwars'));
	}
	public function index(){
		$product = new Product;
		$products = $product->all();
		$image = new Image;

		view("front.index", compact('products', 'image'));
	}
	public function show($id){

		$productModel = new Product;
		$image = new Image;

		$product = $productModel->find('products',$id);

		view("front.single", compact('product','image'));
	}

	public function showCart(){
		$this->cart->all();
		view("front.cart", compact(''));
	}

	public function command(){
		$rules = [
			'id' 		=> FILTER_VALIDATE_INT,
			'price'		=> FILTER_VALIDATE_FLOAT,
			'name'		=> FILTER_SANITIZE_STRING,
			'quantity' 	=> FILTER_VALIDATE_INT
		];

		$sanitize = filter_input_array(INPUT_POST, $rules);

		$productCart = new \Cart\Product($sanitize['name'], $sanitize['price']);
		var_dump($sanitize);
		$this->cart->buy($productCart, $sanitize['quantity'], $sanitize['id']);

		// $this->redirect(url());
	}

	private function redirect($path, $status='200 Ok'){
		header("HTTP/1.1 $status");
		header("Content-Type: html/text charset=UTF-8");
		header("location: $path");
		exit;
	}
}