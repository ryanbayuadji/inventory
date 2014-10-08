<?php
$this->breadcrumbs=array(
	'Sales Transactions',
);

$this->menu=array(
	array('label'=>'Create SalesTransaction','url'=>array('create')),
	array('label'=>'Manage SalesTransaction','url'=>array('admin')),
);
?>

<h1>Sales Transactions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
