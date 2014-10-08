<?php
$this->breadcrumbs=array(
	'Merks',
);

$this->menu=array(
	array('label'=>'Create Merks','url'=>array('create')),
	array('label'=>'Manage Merks','url'=>array('admin')),
);
?>

<h1>Merks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
