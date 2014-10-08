<?php
$this->breadcrumbs=array(
	'Employes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Employes','url'=>array('index')),
	array('label'=>'Create Employes','url'=>array('create')),
	array('label'=>'Update Employes','url'=>array('update','id'=>$model->employe_id)),
	array('label'=>'Delete Employes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->employe_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Employes','url'=>array('admin')),
);
?>

<h1>View Employes #<?php echo $model->employe_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'employe_id',
		'nik',
		'name',
		'address',
		'phone',
		'email',
		'created_user',
		'created_date',
		'modified_user',
		'modified_date',
	),
)); ?>
