<?php
$this->breadcrumbs = array(
    'Suppliers' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Suppliers', 'url' => array('index')),
    array('label' => 'Create Suppliers', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('suppliers-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers</h1>

<?php echo CHtml::link('Tambah Supplier', array('suppliers/create'), array('class' => 'btn btn-primary')); ?>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'suppliers-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'supplier_id',
        'supplier',
        'address',
        'phone',
        array(
            'name' => 'active',
            'filter' => array('Y' => 'Y', 'N' => 'N')
        ),
        'description',
        /*
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
