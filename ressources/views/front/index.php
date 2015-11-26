<?php ob_start(); ?>
<ul>
	<?php foreach ($products as $product): ?>
		<li>
			<a href="<?php echo url('product', $product->id)?>">
				<?php echo $product->title ;?>
			</a>
		</li>
		<li>
			<?php if($image->productImage($product->id)): ?>
			
				<img src="/assets/images/<?php echo $image->productImage($product->id)->uri ;?>" />
			<?php endif; ?>
		</li>
		<li>
			<?php echo $product->price ;?>
		</li>
	<?php endforeach; ?>
</ul>
<?php 
$content = ob_get_clean(); 
include __DIR__ . '/../layouts/master.php';
?>