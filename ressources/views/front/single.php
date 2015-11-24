<?php ob_start(); ?>
<h1>liste des produits</h1>
<ul>
	<?php foreach ($product as $name): ?>
		<li><?php echo $name ;?></li>
	<?php endforeach; ?>
</ul>
<?php 
$content = ob_get_clean(); 
include __DIR__ . '/../layouts/master.php';
?>