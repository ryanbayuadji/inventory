<?php
$this->breadcrumbs = array(
    'Sales Transactions' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List SalesTransaction', 'url' => array('index')),
    array('label' => 'Manage SalesTransaction', 'url' => array('admin')),
);
?>

<h1>Transaksi Penjualan</h1>

<h5>
    Tanggal <?php echo IDDate::getDate(date('Y-m-d')); ?>
</h5>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>