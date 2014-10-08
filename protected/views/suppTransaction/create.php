<?php
$this->breadcrumbs=array(
	'Supp Transactions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppTransaction','url'=>array('index')),
	array('label'=>'Manage SuppTransaction','url'=>array('admin')),
);
?>

<h1>Create SuppTransaction</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>