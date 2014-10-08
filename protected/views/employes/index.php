<?php
$this->breadcrumbs=array(
	'Employes',
);

$this->menu=array(
	array('label'=>'Create Employes','url'=>array('create')),
	array('label'=>'Manage Employes','url'=>array('admin')),
);
?>

<h1>Employes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
