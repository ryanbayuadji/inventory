<?php
$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->supplier_id,
);

$this->menu=array(
	array('label'=>'List Suppliers','url'=>array('index')),
	array('label'=>'Create Suppliers','url'=>array('create')),
	array('label'=>'Update Suppliers','url'=>array('update','id'=>$model->supplier_id)),
	array('label'=>'Delete Suppliers','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->supplier_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suppliers','url'=>array('admin')),
);
?>

<h1>View Suppliers #<?php echo $model->supplier_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'supplier_id',
		'supplier',
		'address',
		'phone',
		'active',
		'description',
		'created_user',
		'created_date',
		'modified_user',
		'modified_date',
	),
)); ?>
