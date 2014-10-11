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

<?php
//echo $form->textFieldRow($model, 'tgl_awal', array('name' => 'tgl_awal')); 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    //'model' => $model,
    'name' => 'tgl_awal',
    'attribute' => 'tgl_awal',
    'options' => array(
        'showAnim' => 'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'    
        'changeMonth' => true,
        'changeYear' => true,
        'dateFormat' => 'yy-mm-dd'
    ),
    'htmlOptions' => array(
        'style' => 'width:150px;vertical-align:top'
    ),
));
?>

<?php
//echo $form->textFieldRow($model, 'tgl_awal', array('name' => 'tgl_awal')); 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    //'model' => $model,
    'name' => 'tgl_akhir',
    'attribute' => 'tgl_akhir',
    'options' => array(
        'showAnim' => 'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'    
        'changeMonth' => true,
        'changeYear' => true,
        'dateFormat' => 'yy-mm-dd'
    ),
    'htmlOptions' => array(
        'style' => 'width:150px;vertical-align:top'
    ),
));
?>


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
<?php if ($valueStart != NULL && $valueEnd != NULL && !empty($dataProvider)) : ?>
    <table class="table table-striped">
        <tr>
            <td>No</td>
            <td>Waktu</td>
            <td>Produk</td>
            <td>Harga Satuan</td>
            <td>Keuntungan</td>
            <td>Sub Total</td>
            <td>Qty</td>
            <td>Stock</td>
        </tr>
        <?php
        $no = 0;
        $total_keseluruhan = 0;
        $total_keuntungan = 0;
        $total_subtotal = 0;
        foreach ($dataProvider as $data) :
            ?>
            <tr>
                <td>
                    <?php echo++$no; ?>
                </td>
                <td>
                    <?php echo IDDate::getDate($data->sales_date); ?>                    
                </td>
                <td>
                    <?php echo $data->rel_product->product; ?>
                </td>
                <td>
                    <?php echo 'Rp. ' . number_format($data->sales_price, 2, ',', '.'); ?>
                </td>
                <td>
                    <?php echo 'Rp. ' . number_format($data->profit, 2, ',', '.'); ?>
                </td>
                <td>
                    <?php echo 'Rp. ' . number_format($data->subtotal, 2, ',', '.'); ?>
                </td>
                <td>
                    <?php echo $data->sales_qty; ?>
                </td>
                <td>
                    <?php echo $data->sales_stock; ?>
                </td>
            </tr>
            <?php
            $total_keseluruhan+=$data->sales_price;
            $total_keuntungan+=$data->profit;
            $total_subtotal+=$data->subtotal;
            ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" align="right">Total</td>
            <td><?php echo 'Rp. '.number_format($total_keseluruhan, 2, ',', '.');?></td>
            <td><?php echo 'Rp. '.number_format($total_keuntungan, 2, ',', '.');?></td>
            <td><?php echo 'Rp. '.number_format($total_subtotal, 2, ',', '.');?></td>
            <td colspan="2"></td>
        </tr>
    </table>
<?php endif; ?>