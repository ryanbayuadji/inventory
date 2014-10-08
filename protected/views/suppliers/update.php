<?php
$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->supplier_id=>array('view','id'=>$model->supplier_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suppliers','url'=>array('index')),
	array('label'=>'Create Suppliers','url'=>array('create')),
	array('label'=>'View Suppliers','url'=>array('view','id'=>$model->supplier_id)),
	array('label'=>'Manage Suppliers','url'=>array('admin')),
);
?>

<h1>Update Suppliers # <?php echo $model->supplier; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>