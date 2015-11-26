<?php ob_start(); ?>
<h1>Pannier</h1>
<?php var_dump($_SESSION); ?>
<?php 
$content = ob_get_clean(); 
include __DIR__ . '/../layouts/master.php';
?>