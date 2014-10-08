<?php
$this->breadcrumbs=array(
	'Supp Transactions',
);

$this->menu=array(
	array('label'=>'Create SuppTransaction','url'=>array('create')),
	array('label'=>'Manage SuppTransaction','url'=>array('admin')),
);
?>

<h1>Supp Transactions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
