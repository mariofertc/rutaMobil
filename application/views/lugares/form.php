<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>

<?php
//echo form_open('incidencias/find_incidencia_info/'.$incidencia_info->id,array('id'=>'incidencia_number_form'));
?>
<?php
//echo form_close();
echo form_open('lugares/save/'.$info->id,array('id'=>'form'));
?>
<fieldset id="basic_info">
<legend>Información</legend>


<div class="field_row clearfix">
<?php echo form_label('Lugar:', 'lugar',array('class'=>'ssmall_wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'lugar',
		'id'=>'lugar',
		'value'=>$info->nombre)
	);?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label('Dirección:', 'direccion',array('class'=>'ssmall_wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'direccion',
		'id'=>'direccion',
		'value'=>$info->direccion)
	);?>
	</div>
</div>
<div class="field_row clearfix">
<?php echo form_label('Coordenadas:', 'coordenadas',array('class'=>'ssmall_wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'coordenadas',
		'id'=>'coordenadas',
		'value'=>$info->coordenadas)
	);?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label('Descripción:', 'descripcion',array('class'=>'ssmall_wide')); ?>
	<div class='form_field'>
	<?php echo form_textarea(array(
		'name'=>'descripcion',
		'id'=>'descripcion',
		'value'=>$info->descripcion,
		'rows'=>4,
		'cols'=>18)
	);?>
	</div>
</div>
<div class="field_row clearfix">
<?php echo form_label('Interes:', 'interes',array('class'=>'ssmall_wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'interes',
		'id'=>'interes',
		'value'=>$info->interes)
	);?>
	</div>
</div>
<div class="field_row clearfix">
<?php echo form_label('Sector:', 'sectorn',array('class'=>'ssmall_wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'sector',
		'id'=>'sector',
		'value'=>$info->sector)
	);?>
	</div>
</div>

<div class="field_row clearfix">
<?php echo form_label('Enlace:', 'enlace',array('class'=>'ssmall_wide')); ?>
	<div class='form_field'>
	<?php echo form_input(array(
		'name'=>'enlace',
		'id'=>'enlace',
		'value'=>$info->nombre_enlace)
	);?>
	</div>
</div>
</fieldset>

<br>
<br>
<?php
echo form_submit(array(
	'name'=>'submit',
	'id'=>'submit',
	'value'=>'Guardar',
	'class'=>'submit_button float_right')
);
?>

<?php
echo form_close();
?>


<script type='text/javascript'>
//validation and submit handling
$(document).ready(function()
{	
	//$("#category").autocomplete("<?php // echo site_url('incidencia/suggest_category');?>",{max:100,minChars:0,delay:10});
    //$("#category").result(function(event, data, formatted){});
	//$("#category").search();

	$('#form').validate({
		submitHandler:function(form)
		{			
			$(form).ajaxSubmit({
			success:function(response)
			{
				tb_remove();
				post_lugar_form_submit(response);
			},
			dataType:'json'
		});

		},
		errorLabelContainer: "#error_message_box",
 		wrapper: "li",
		rules:
		{
			lugar:"required",
			descripcion:"required",
			enlace:"required"
   		},
		messages:
		{
			lugar:"Lugar Requerido",
			descripcion:"Descripción Requerida",
			enlace:"Enlace Requerido"
		}
	});
});
</script>

