<?php
$this->breadcrumbs = array(
    'Supp Transactions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List SuppTransaction', 'url' => array('index')),
    array('label' => 'Create SuppTransaction', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('supp-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pembelian</h1>
<?php
echo CHtml::link('[+]', Yii::app()->controller->createUrl('create'), array('class' => 'btn btn-primary'));
?>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'supp-transaction-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'type' => 'raw',
            'header' => 'No',
            'htmlOptions' => array(
                'style' => 'text-align:right',
            ),
            'headerHtmlOptions' => array(
                'style' => 'text-align:right'
            ),
            'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
        array(
            'name' => 'supplier_id',
            'value' => '$data[\'rel_supplier\'][\'supplier\']',
            'filter' => CHtml::listData(Suppliers::model()->findAll(), 'supplier_id', 'supplier')
        ),
        array(
            'name' => 'product_id',
            'value' => '$data[\'rel_product\'][\'product\']',
            'filter' => CHtml::listData(Products::model()->findAll(), 'product_id', 'product')
        ),
        array(
            'name' => 'supp_price',
            'value' => '$data->getSuppPrice()', 
            'filter' => ''
        ),
        array(
            'name' => 'supp_qty',
            'filter' => ''
        ),
        array(
            'name' => 'subtotal',
            'value'=>'$data->getSubTotal()',
            'filter' => ''
        ),
        /*
          'description',
          'buys_date',
          'buys_time',
          'user_id',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
