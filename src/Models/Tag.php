<?php  namespace Models;
class Tag extends Model{
	protected $table='tags';
	protected $order='published_at';

	public function getTag(WQ){
		$sql = sprintf("
			SELECT * FROM tags as t INNER JOIN product_tags as pt ON t.id = pt.tag_id WHERE pt.product_id= %d",
			(int) $product->id

			);
	}
}