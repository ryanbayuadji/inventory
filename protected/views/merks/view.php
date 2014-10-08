<?php
$this->breadcrumbs=array(
	'Merks'=>array('index'),
	$model->merk_id,
);

$this->menu=array(
	array('label'=>'List Merks','url'=>array('index')),
	array('label'=>'Create Merks','url'=>array('create')),
	array('label'=>'Update Merks','url'=>array('update','id'=>$model->merk_id)),
	array('label'=>'Delete Merks','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->merk_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Merks','url'=>array('admin')),
);
?>

<h1>View Merks #<?php echo $model->merk_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'merk_id',
		'merk',
		'active',
		'created_user',
		'created_date',
		'modified_user',
		'modified_date',
	),
)); ?>
