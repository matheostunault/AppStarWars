<?php 
interface Storable{
	function setValue($name,$value);
	function restore($name);
	function reset();
	function total();
}