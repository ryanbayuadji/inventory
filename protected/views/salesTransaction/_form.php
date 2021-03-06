<script>
    $(document).ready(function(){
        var refund = '<?php echo $refund; ?>';
        if(refund == true){
            $('.span5').attr('readonly', 'readonly');
        }
    });

</script>
<?php
foreach (Yii::app()->user->getFlashes() as $type => $flash) {
    echo "<div class=alert alert-" . $type . ">" . $flash . "</div>";
}
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'sales-transaction-form',
    'htmlOptions' => array(
        'class' => 'well'
    ),
    'type' => 'horizontal',
    'enableAjaxValidation' => false,
        ));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropdownlistRow($model, 'product_id', CHtml::listData(Products::model()->findAll(array('select' => 'product_id, product', 'order' => 'product')), 'product_id', 'product'), array('class' => 'span5', 'empty' => 'Pilih Produk')); ?>

<?php echo $form->textFieldRow($model, 'sales_price', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'sales_qty', array('class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

<div class="form-actions">
    <?php
    $label = '';
    if ($model->isNewRecord) {
        $label = 'Create';
    } else if ($refund == true) {
        $label = 'Refund';
    } else {
        $label = 'Save';
    }
    if ($model->active != 'N') {
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $label
        ));
    }
    ?>
</div>

<?php $this->endWidget(); ?>
