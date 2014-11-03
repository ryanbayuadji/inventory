<?php
$this->breadcrumbs = array(
    'Sales Transactions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List SalesTransaction', 'url' => array('index')),
    array('label' => 'Create SalesTransaction', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sales-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Penjualan</h1>

<?php
echo CHtml::link('[+]', Yii::app()->controller->createUrl('create'), array('class' => 'btn btn-primary'));
?>
<div>
    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
        Delete All
    </button>
</div>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'sales-transaction-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'trx_id',
        array(
            'value' => '$row+1',
            'header' => 'No'
        ),
        array(
            'name' => 'product_name',
            'value' => '$data[\'rel_product\'][\'product\']'
        ),
        array(
            'name' => 'sales_price',
            'value' => '$data->getPrice()',
            'filter' => ''
        ),
        array(
            'name' => 'profit',
            'value' => '$data->getProfit()',
            'filter' => ''
        ),
        array(
            'name' => 'sales_qty',
            'value' => '$data->getQty()',
            'filter' => ''
        ),
        array(
            'name' => 'sales_stock',
            'value' => '$data->getStock()',
            'filter' => ''
        ),
        array(
            'header' => 'Waktu',
            'filter' => '',
            'value' => '$data->sales_date.\' \'.$data->sales_time'
        ),
        /*
          'subtotal',
          'sales_date',
          'sales_time',
          'description',
          'user_id',
         */
        array(
            'value' => 'CHtml::link("Refund", Yii::app()->controller->createUrl("refund", array("id"=>$data->trx_id)))',
            'type' => 'raw'
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">        
                <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <h2>Apakah Anda Yakin Akan Menghapus Semua Data????</h2>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <?php
                $label = "<button type='button' class='btn btn-primary' id='mySubmit'>Yes</button>";
                echo CHtml::link($label, Yii::app()->controller->createUrl('deleteall'));
                ?>
            </div>
        </div>
    </div>
</div>