<?php
$this->breadcrumbs = array(
    'Sales Transactions' => array('index'),
    $model->trx_id,
);

$this->menu = array(
    array('label' => 'List SalesTransaction', 'url' => array('index')),
    array('label' => 'Create SalesTransaction', 'url' => array('create')),
    array('label' => 'Update SalesTransaction', 'url' => array('update', 'id' => $model->trx_id)),
    array('label' => 'Delete SalesTransaction', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->trx_id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage SalesTransaction', 'url' => array('admin')),
);
?>

<h1>View SalesTransaction #<?php echo $model->trx_id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'trx_id',
        'rel_product.product',
        array(
            'name' => 'sales_price',
            'value' => $model->getPrice()
        ),
        array(
            'name' => 'profit',
            'value' => $model->getProfit()
        ),
        array(
            'name' => 'subtotal',
            'value' => $model->getSubTotal()
        ),
        'sales_qty',
        'sales_stock',
        'sales_date',
        'sales_time',
        'description',
        'user_id',
    ),
));
?>
