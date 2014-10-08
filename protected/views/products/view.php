<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->product_id,
);

$this->menu=array(
	array('label'=>'List Products','url'=>array('index')),
	array('label'=>'Create Products','url'=>array('create')),
	array('label'=>'Update Products','url'=>array('update','id'=>$model->product_id)),
	array('label'=>'Delete Products','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->product_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Products','url'=>array('admin')),
);
?>

<h1>View Products #<?php echo $model->product_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'product_id',
		'category_id',
		'supplier_id',
		'product',
		'price',
		'po_price',
		'pm_price',
		'stock',
		'active',
		'description',
		'created_user',
		'created_date',
		'modified_user',
		'modified_date',
	),
)); ?>
