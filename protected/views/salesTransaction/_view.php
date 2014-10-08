<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('trx_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->trx_id),array('view','id'=>$data->trx_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_price')); ?>:</b>
	<?php echo CHtml::encode($data->sales_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profit')); ?>:</b>
	<?php echo CHtml::encode($data->profit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_qty')); ?>:</b>
	<?php echo CHtml::encode($data->sales_qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_stock')); ?>:</b>
	<?php echo CHtml::encode($data->sales_stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subtotal')); ?>:</b>
	<?php echo CHtml::encode($data->subtotal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_date')); ?>:</b>
	<?php echo CHtml::encode($data->sales_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_time')); ?>:</b>
	<?php echo CHtml::encode($data->sales_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>