<?php
$this->breadcrumbs=array(
	'Supp Transactions'=>array('index'),
	$model->trx_id=>array('view','id'=>$model->trx_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppTransaction','url'=>array('index')),
	array('label'=>'Create SuppTransaction','url'=>array('create')),
	array('label'=>'View SuppTransaction','url'=>array('view','id'=>$model->trx_id)),
	array('label'=>'Manage SuppTransaction','url'=>array('admin')),
);
?>

<h1>Update SuppTransaction <?php echo $model->trx_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>