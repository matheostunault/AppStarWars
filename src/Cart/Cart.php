<?php 
namespace Cart;
class Cart{
	private $storage = null;

	public function __construc($storage){
		$this->storage = $storage ;
	}

	public function buy($product,$quantity){

		$quantity = abs((int) $quantity);

		$this->storage->setValue($product->name, $product->price*$quantity);
		
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
}