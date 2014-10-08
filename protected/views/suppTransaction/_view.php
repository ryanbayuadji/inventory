<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('trx_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->trx_id),array('view','id'=>$data->trx_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplier_id')); ?>:</b>
	<?php echo CHtml::encode($data->supplier_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supp_price')); ?>:</b>
	<?php echo CHtml::encode($data->supp_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supp_qty')); ?>:</b>
	<?php echo CHtml::encode($data->supp_qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subtotal')); ?>:</b>
	<?php echo CHtml::encode($data->subtotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('buys_date')); ?>:</b>
	<?php echo CHtml::encode($data->buys_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buys_time')); ?>:</b>
	<?php echo CHtml::encode($data->buys_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>