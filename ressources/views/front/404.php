<?php ob_start(); ?>
<h1>
	<?php echo $message ?>
</h1>

<?php 
$content = ob_get_clean(); 
include __DIR__ . '/../layouts/master.php';
?>