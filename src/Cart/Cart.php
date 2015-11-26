<?php 
namespace Cart;
class Cart{
	private $storage = null;

	public function __construct($storage){
		$this->storage = $storage ;
	}

	public function buy($product,$quantity,$id){

		$quantity = abs((int) $quantity);

		$this->storage->setValue($product->name, $product->price*$quantity,$id);
		
		return $this;
	}

	public function restore($product,$quantity){
		$this->storage->restore($product->name);
		return $this;
	}

	public function total(){
		return array_sum($this->storage);
	}

	public function reset(){
		$this->storage->reset();
	}

	public function all(){
		return $this->storage->all();
	}
}