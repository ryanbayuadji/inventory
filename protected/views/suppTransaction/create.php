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

<h1>Tambah Pembelian</h1>

<h5>
    Tanggal <?php echo IDDate::getDate(date('Y-m-d')); ?>
</h5>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>