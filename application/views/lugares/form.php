<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>

<?php
//echo form_open('incidencias/find_incidencia_info/'.$incidencia_info->id,array('id'=>'incidencia_number_form'));
?>
<?php
//echo form_close();
echo form_open_multipart('lugares/save/' . $info->id, array('id' => 'form'));
?>
<fieldset id="basic_info">
    <legend>Información</legend>


    <div class="field_row clearfix">
        <?php echo form_label('Lugar:', 'lugar', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_input(array(
                'name' => 'lugar',
                'id' => 'lugar',
                'value' => $info->nombre)
            );
            ?>
        </div>
    </div>

    <div class="field_row clearfix">
        <?php echo form_label('Dirección:', 'direccion', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_input(array(
                'name' => 'direccion',
                'id' => 'direccion',
                'value' => $info->direccion)
            );
            ?>
        </div>
    </div>
    <fieldset id="basic_info">
        <legend>Coordenadas:</legend>
        <div class="field_row clearfix">
            <?php echo form_label('Latitud:', 'latitud', array('class' => 'ssmall_wide')); ?>
            <div class='form_field'>
                <?php
                echo form_input(array(
                    'name' => 'latitud',
                    'id' => 'latitud',
                    'value' => $info->latitud)
                );
                ?>
            </div>
        </div>
        <div class="field_row clearfix">
            <?php echo form_label('Longitud:', 'longitud', array('class' => 'ssmall_wide')); ?>
            <div class='form_field'>
                <?php
                echo form_input(array(
                    'name' => 'longitud',
                    'id' => 'longitud',
                    'value' => $info->longitud)
                );
                ?>
            </div>
        </div>
        <div class="field_row clearfix">
            <?php echo form_label('Altura:', 'altitud', array('class' => 'ssmall_wide')); ?>
            <div class='form_field'>
                <?php
                echo form_input(array(
                    'name' => 'altitud',
                    'id' => 'altitud',
                    'value' => $info->altitud)
                );
                ?>
            </div>
        </div>
    </fieldset>
    <div class="field_row clearfix">
        <?php echo form_label('Descripción:', 'descripcion', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_textarea(array(
                'name' => 'descripcion',
                'id' => 'descripcion',
                'value' => $info->descripcion,
                'rows' => 4,
                'cols' => 50)
            );
            ?>
        </div>
    </div>
    <div class="field_row clearfix">
        <?php echo form_label('Que debe saber:', 'interes', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_textarea(array(
                'name' => 'interes',
                'id' => 'interes',
                'value' => $info->interes,
                'rows' => 4,
                'cols' => 50)
            );
            ?>
        </div>
    </div>
    <div class="field_row clearfix">
        <?php echo form_label('Sector:', 'sectorn', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_input(array(
                'name' => 'sector',
                'id' => 'sector',
                'value' => $info->sector)
            );
            ?>
        </div>
    </div>

    <div class="field_row clearfix">
        <?php echo form_label('Enlace:', 'enlace', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_input(array(
                'name' => 'enlace',
                'id' => 'enlace',
                'value' => $info->nombre_enlace)
            );
            ?>
        </div>
    </div>

    <div class="field_row clearfix">
        <?php echo form_label('Imagen:', 'imagen', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_upload(array(
                'name' => 'userfile',
                'size' => 20)
            );
            ?>
        </div>
    </div>
    <div class="field_row clearfix">
        <?php // echo form_label('Path actual: ' . base_url() . 'images/imglugar/' . $info->nombre_enlace . '/' . $info->imagen_path, 'path', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <img src="<?php echo base_url() . 'images/imglugar/' . $info->nombre_enlace . '/' . $info->imagen_path ?>" width="30px">
        </div>
    </div>
    <?php echo form_hidden('categoria_id', $categoria_id) ?>
</fieldset>

<br>
<br>
<?php
echo form_submit(array(
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Guardar',
    'class' => 'submit_button float_right')
);
?>

<?php
echo form_close();
?>


<script type='text/javascript'>
    //validation and submit handling
    $(document).ready(function()
    {	
        //$("#category").autocomplete("<?php // echo site_url('incidencia/suggest_category');     ?>",{max:100,minChars:0,delay:10});
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

