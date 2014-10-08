<?php
$this->breadcrumbs=array(
	'Supp Transactions'=>array('index'),
	$model->trx_id,
);

$this->menu=array(
	array('label'=>'List SuppTransaction','url'=>array('index')),
	array('label'=>'Create SuppTransaction','url'=>array('create')),
	array('label'=>'Update SuppTransaction','url'=>array('update','id'=>$model->trx_id)),
	array('label'=>'Delete SuppTransaction','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->trx_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppTransaction','url'=>array('admin')),
);
?>

<h1>View SuppTransaction #<?php echo $model->trx_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'trx_id',
		'supplier_id',
		'product_id',
		'supp_price',
		'supp_qty',
		'subtotal',
		'description',
		'buys_date',
		'buys_time',
		'user_id',
	),
)); ?>
