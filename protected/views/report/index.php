<?php
$this->breadcrumbs = array(
    'Sales Transactions' => array('index'),
    'Create',
);
?>
<h1>Laporan Penjualan</h1>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'login-form',
    'type' => 'inline',
    'htmlOptions' => array(
        'class' => 'well'
    ),
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<?php echo $form->textFieldRow($model, 'tgl_awal', array('name' => 'tgl_awal')); ?>

<?php echo $form->textFieldRow($model, 'tgl_akhir', array('name' => 'tgl_akhir')); ?>


<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Show',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
<?php
if ($valueStart != NULL && $valueEnd != NULL)
    echo CHtml::link('.Xls', Yii::app()->controller->createUrl('excel', array('tgl_awal' => $valueStart, 'tgl_akhir' => $valueEnd)), array('class' => 'btn btn-success'));
?>
<?php
if (!empty($dataProvider))
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'sales-transaction-grid',
        'dataProvider' => $dataProvider,
        'enableSorting' => FALSE,
        'summaryText' => '',
        'itemsCssClass' => 'table table-striped table-bordered',
        'columns' => array(
//'trx_id',
            array(
                'value' => '$row+1',
                'header' => 'No'
            ),
            array(
                'header' => 'Waktu',
                'filter' => '',
                'value' => '$data[\'sales_date\'].\' \'.$data[\'sales_time\']'
            ),
            array(
                'header' => 'Produk',
                'value' => '$data[\'product\']'
            ),
            array(
                'header' => 'Harga Satuan',
                'type' => 'raw',
                'value' => 'number_format($data[\'sales_price\'], 2, \',\', \'.\')',
                'filter' => ''
            ),
            array(
                'header' => 'Keuntungan',
                'value' => 'number_format($data[\'profit\'], 2, \',\', \'.\')',
                'filter' => ''
            ),
            array(
                'header' => 'Sub Total',
                'value' => 'number_format($data[\'subtotal\'], 2, \',\', \'.\')'
            ),
            array(
                'header' => 'Qty',
                'value' => '$data[\'sales_qty\']',
                'filter' => ''
            ),
            array(
                'header' => 'Stok',
                'value' => '$data[\'stock\']',
                'filter' => ''
            )
        ),
    ));
?>
