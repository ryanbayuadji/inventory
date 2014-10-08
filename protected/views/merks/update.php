<?php
$this->breadcrumbs=array(
	'Merks'=>array('index'),
	$model->merk_id=>array('view','id'=>$model->merk_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Merks','url'=>array('index')),
	array('label'=>'Create Merks','url'=>array('create')),
	array('label'=>'View Merks','url'=>array('view','id'=>$model->merk_id)),
	array('label'=>'Manage Merks','url'=>array('admin')),
);
?>

<h1>Update Merks <?php echo $model->merk_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>