<?php
class Category extends AppModel
{
	var $name="Category";
	public $belongsTo=array(
		'SubCategory'=>array(
			'className'=>'Category',
			'foreignKey'=>'parent_id'));
}
?>
