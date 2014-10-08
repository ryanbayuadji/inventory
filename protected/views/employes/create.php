<?php
$this->breadcrumbs=array(
	'Employes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Employes','url'=>array('index')),
	array('label'=>'Manage Employes','url'=>array('admin')),
);
?>

<h1>Create Employes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>