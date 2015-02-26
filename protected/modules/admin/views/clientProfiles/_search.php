<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<div class="col-md-12">
			<div class="box border inverse mb0">
				<div class="box-title">
					<h4><i class="fa fa-search"></i>Advanced Search</h4>
					<div class="tools hidden-xs">
						<a href="javascript:;" class="expand">
							<i class="fa fa-chevron-down"></i>
						</a>
					</div>
				</div>
				<div class="box-body big" style="display:none;">
				<?php echo $form->errorSummary($model); ?>

	        <div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'id', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'id',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'first_name', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>


			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'last_name', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'company_name', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'company_name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'email', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'phone_number', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'phone_number',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'address1', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>240,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'category', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'category',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
					</div>
			</div>


			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'add_date', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'add_date',
								'htmlOptions' => array(
									'size' => '25',         // textField size
									'maxlength' => '25', 
									'class'=>'form-control'   // textField maxlength
								),
							));
						?>
						</div>
			</div>
  			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'company_link', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'company_link',array('size'=>60,'maxlength'=>245,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'skype_id', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'skype_id',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
			</div>
	        <div class="row">
	            	<div class="col-sm-4 tr-align"></div>
	            	<div class="col-sm-6 col-offset-sm-2 search-button">
						<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
					</div>
				</div>
              <?php $this->endWidget(); ?>

        </div>
     </div>
   </div>
</div>   
</div>