<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'supp-transaction-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array(
        'class' => 'well'
    )
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php
echo $form->dropdownlistRow($model, 'supplier_id', CHtml::listData(
                Suppliers::model()->findAll(), 'supplier_id', 'supplier'
        ), array('class' => 'span5', 'empty' => 'Pilih Supplier'));
?>

<?php
echo $form->dropdownlistRow($model, 'product_id', CHtml::listData(
                Products::model()->findAll(array(
                    'select' => 'product_id, product',
                    'order' => 'product'
                )), 'product_id', 'product'
        ), array('class' => 'span5', 'empty' => 'Pilih Produk'));
?>

<?php echo $form->textFieldRow($model, 'supp_price', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'supp_qty', array('class' => 'span5')); ?>

<?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'buys_date', array('class' => 'span5', 'readonly' => 'readonly')); ?>

<?php echo $form->textFieldRow($model, 'buys_time', array('class' => 'span5', 'readonly' => 'readonly')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
