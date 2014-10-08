<?php
$this->breadcrumbs=array(
	'Sales Transactions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SalesTransaction','url'=>array('index')),
	array('label'=>'Manage SalesTransaction','url'=>array('admin')),
);
?>

<h1>Create SalesTransaction</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>