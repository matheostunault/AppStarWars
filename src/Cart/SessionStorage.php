<?php namespace Cart;
 class SessionStorage{
 	private $sessionName;

 	public function __construct($sessionName='product'){
 		session_start();
 		if(!isset($_SESSION[$sessionName])){
 			$_SESSION[$sessionName] = [];
 		}
 		$this->sessionName = $sessionName;
 	}

 	public function setValue($name, $value, $id){
 		if(empty($_SESSION[$this->sessionName][$name])){
 			$_SESSION[$this->sessionName][$name] = 0;
 		}
 			$_SESSION[$this->sessionName][$name] = [ 	
 														'value' => $value,
 														'id' => $id			
 													];
 	}

 	public function restore($name){
 		if(!empty($_SESSION[$this->sessionName][$name])){
 			unset($_SESSION[$this->sessionName][$name]);
 		}
 		return $this;
 	}

 	public function total(){
 		return array_sum($_SESSION[$this->sessionName]);
 	}

 	public function reset(){
 		$_SESSION[$this->sessionName] = [];
 	}

 	public function all(){
 		return $_SESSION[$this->sessionName];
 	}
 }