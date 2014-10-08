<?php
$this->breadcrumbs=array(
	'Employes'=>array('index'),
	$model->name=>array('view','id'=>$model->employe_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Employes','url'=>array('index')),
	array('label'=>'Create Employes','url'=>array('create')),
	array('label'=>'View Employes','url'=>array('view','id'=>$model->employe_id)),
	array('label'=>'Manage Employes','url'=>array('admin')),
);
?>

<h1>Update Employes <?php echo $model->employe_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>