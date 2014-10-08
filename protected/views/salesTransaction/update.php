<?php
$this->breadcrumbs=array(
	'Sales Transactions'=>array('index'),
	$model->trx_id=>array('view','id'=>$model->trx_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SalesTransaction','url'=>array('index')),
	array('label'=>'Create SalesTransaction','url'=>array('create')),
	array('label'=>'View SalesTransaction','url'=>array('view','id'=>$model->trx_id)),
	array('label'=>'Manage SalesTransaction','url'=>array('admin')),
);
?>

<h1>Update SalesTransaction <?php echo $model->trx_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>