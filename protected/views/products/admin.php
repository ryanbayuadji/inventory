<?php
$this->breadcrumbs = array(
    'Products' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Products', 'url' => array('index')),
    array('label' => 'Create Products', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('products-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manajemen Produk</h1>
<?php
echo CHtml::link('[+]', Yii::app()->controller->createUrl('create'), array('class' => 'btn btn-primary'));
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'products-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'product_id',
            'filter' => ''
        ),
        array(
            'name' => 'category_id',
            'value' => '$data[\'rel_categories\'][\'category\']',
            'filter' => CHtml::listData(Categories::model()->findAll(array('select' => 'category_id, category', 'order' => 'category asc')), 'category_id', 'category')
        ),
        array(
            'name' => 'supplier_id',
            'value' => '$data[\'rel_supplier\'][\'supplier\']',
            'filter' => CHtml::listData(Suppliers::model()->findAll(array('select' => 'supplier_id, supplier', 'order' => 'supplier asc')), 'supplier_id', 'supplier')
        ),
        'product',
        array(
            'name' => 'price',
            'value' => '$data->getPrice()',
            'filter' => '',
            'htmlOptions' => array(
                'style' => 'text-align:left;width:150px;'
            ),
            'footer' => $model->getTotalPrice(),
        ),
        array(
            'name' => 'po_price',
            'value' => '$data->getPoPrice()',
            'filter' => '',
            'htmlOptions' => array(
                'style' => 'text-align:left;width:150px;'
            ),
            'footer' => $model->getTotalPoPrice(),
        ),
        array(
            'name' => 'pm_price',
            'value' => '$data->getPmPrice()',
            'filter' => '',
            'htmlOptions' => array(
                'style' => 'text-align:left;width:150px;'
            ),
            'footer' => $model->getTotalPmPrice(),
        ),
        array(
            'name' => 'due_date',
            'filter' => '',
            'type' => 'raw',
            'value' => '$data->getDueDate()',
            'htmlOptions' => array(
                'style' => 'text-align:left;width:90px;'
            ),
        ),
        array(
            'name' => 'stock',
            'filter' => ''
        ),
        /*

          'active',
          'description',
          'created_user',
          'created_date',
          'modified_user',
          'modified_date',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
