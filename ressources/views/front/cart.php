<?php ob_start(); ?>
<h1>Pannier</h1>
<form action="http://localhost:8000/command" method="post">
	<div>
		<label for="product">product</label>
			<input name="product" type="text">
	</div>
	<div>
		<label for="quantity">quantity</label>
			<input name="quantity" type="text">
	</div>
	<input type="submit">
</form>
<?php 
$content = ob_get_clean(); 
include __DIR__ . '/../layouts/master.php';
?>