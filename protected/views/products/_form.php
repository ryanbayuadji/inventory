<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'products-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array(
        'class' => 'well'
    )
        ));
?>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropdownlistRow($model, 'category_id', CHtml::listData(Categories::model()->findAll(array('select' => 'category_id, category', 'order' => 'category')), 'category_id', 'category'), array('class' => 'span5', 'empty' => 'Pilih Kategori')); ?>

<?php echo $form->dropdownlistRow($model, 'supplier_id', CHtml::listData(Suppliers::model()->findAll(array('select' => 'supplier_id, supplier', 'order' => 'supplier')), 'supplier_id', 'supplier'), array('class' => 'span5', 'empty' => 'Pilih Suplayer')); ?>

<?php echo $form->textFieldRow($model, 'product', array('class' => 'span5', 'maxlength' => 128)); ?>

<?php echo $form->textFieldRow($model, 'price', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'po_price', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'pm_price', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'stock', array('class' => 'span5')); ?>

<?php echo $form->dropdownlistRow($model, 'active', array('Y' => 'Y', 'N' => 'N'), array('class' => 'span5', 'maxlength' => 1, 'empty' => 'Pilih Aktif')); ?>

<?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

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
