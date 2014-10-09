<?php
$this->breadcrumbs = array(
    'Categories' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Categories', 'url' => array('index')),
    array('label' => 'Create Categories', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('categories-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manajemen Kategori</h1>
<?php
echo CHtml::link('[+]', Yii::app()->controller->createUrl('create'), array('class' => 'btn btn-primary'));
?>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'categories-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'table table-striped',
    'columns' => array(
        'category_id',
        'category',
        array(
            'name' => 'active',
            'filter' => array(
                'Y' => 'Y',
                'N' => 'N'
            )
        ),
        array(
            'name' => 'created_user',
            'filter' => CHtml::listData(Users::model()->findAll(array('select' => 'user_id, nama', 'order' => 'nama asc')), 'user_id', 'nama'),
            'value' => '$data->reluser->nama'//menampilkan nama user menggunakan relasi pada model
        ),
        //'created_date',
        //'modified_user',
        /*
          'modified_date',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
