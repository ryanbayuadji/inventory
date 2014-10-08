<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'users-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal',
    'htmlOptions' => array('class' => 'well'),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'nik', array('class' => 'span5', 'maxlength' => 16)); ?>

<?php echo $form->textFieldRow($model, 'nama', array('class' => 'span5', 'maxlength' => 50)); ?>

<?php echo $form->textFieldRow($model, 'telp', array('class' => 'span5', 'maxlength' => 20)); ?>

<?php echo $form->textAreaRow($model, 'alamat', array('class' => 'span5', 'maxlength' => 20, 'rows' => 5)); ?>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 32)); ?>

<?php echo $form->dropDownListRow($model, 'level', array('Administrator' => 'Administrator', 'Sales' => 'Sales'), array('empty' => 'Select Level', 'class' => 'span5', 'maxlength' => 20)); ?>

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
