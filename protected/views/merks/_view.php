<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('merk_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->merk_id),array('view','id'=>$data->merk_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merk')); ?>:</b>
	<?php echo CHtml::encode($data->merk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_user')); ?>:</b>
	<?php echo CHtml::encode($data->modified_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />


</div>