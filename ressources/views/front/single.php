<?php ob_start(); ?>
<h1>un seul produits</h1>
<ul>
	<?php foreach ($product as $p): ?>
		<li>
			<?php echo $p->title ?>
			
		</li>
		<img src="<?php echo url("/assets/images/".$image->productImage($p->id)->uri) ;?>" />
	<?php endforeach; ?>
	

		<form action="<?php echo url('command') ?>" method="post">
			<input type="hidden" name="id" value="<?php echo $p->id ?>">
			<input type="hidden" name="name" value="<?php echo $p->title ?>">
			<input type="hidden" name="price" value="<?php echo $p->price ?>">
			<select name="quantity">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
			<input type="submit" >
		</form>
</ul>
<?php 
$content = ob_get_clean(); 
include __DIR__ . '/../layouts/master.php';
?>