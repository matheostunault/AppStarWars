<?php
////////////////
//autoload... //
////////////////

require_once __DIR__ .'/vendor/autoload.php';
use Models\Model;
use cart\Product;

/////////////////
//functions... //
/////////////////

function view($path, $data, $status="200 Ok"){
	$fileName= __DIR__.'/ressources/views/'.str_replace('.','/', $path). '.php';

	if (!file_exists($fileName)) die(sprintf('le fichier n\'existe pas %s', $fileName));
	extract($data);
	include $fileName;
	
	if ($status === '404 Not Found'){
		header('HTTP/1.1 404 Not Found');
	}
	if ($status === '200 Ok'){
		header('HTTP/1.1 200 Ok');
		header('content-type: text/html; charset=utf-8');
	}	
}
function url($path='',$param=''){
	if(!empty($param)) $param = "/$param";

		return "http://localhost:8000/" . $path . $param;
}

/////////////////////////
// connect database... //
/////////////////////////

\Connect::set(['dsn' => 'mysql:host=localhost;dbname=db_starwars','username' => 'root', 'password'=>'']);

///////////////
//request... //
///////////////

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = strtolower($_SERVER["REQUEST_METHOD"]);

///////////
//root...//
///////////

if( $method === 'get'){
	switch($uri){
		case "/":
			$frontController = new Controllers\FrontController;
			$frontController->index();
			break;

		case preg_match('/\/product\/([1-9][0-9]*)/', $uri, $m) == 1:
			$frontControler = new Controllers\FrontController;
			$frontControler->show($m[1]);
			break;

			case "/cart":
			$frontController = new Controllers\FrontController;
			$frontController->showCart();
			break;



		default :
			$message = 'Page not found';
			view('front.404', compact('message'),'404 Not Found');
	}
}

if ($method === 'post'){
	switch($uri){
		case '/command':
			$frontControler = new Controllers\FrontController;
			$frontControler->command();
			break;
	}
}
