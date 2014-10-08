<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sales-transaction-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'product_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sales_price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'profit',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sales_qty',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sales_stock',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'subtotal',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sales_date',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'sales_time',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
