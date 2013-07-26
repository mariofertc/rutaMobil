<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>

<?php
//echo form_open('incidencias/find_incidencia_info/'.$incidencia_info->id,array('id'=>'incidencia_number_form'));
?>
<?php
//echo form_close();
//echo form_open('fotos/save/' . $info->id, array('id' => 'form'));
echo form_open_multipart('fotos/save/' . $info->id, array('id' => 'form'));
//echo form_open_multipart('gallery');
?>
<fieldset id="basic_info">
    <legend>Información</legend>


    <div class="field_row clearfix">
        <?php echo form_label('Nombre:', 'nombre', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_input(array(
                'name' => 'nombre',
                'id' => 'nombre',
                'value' => $info->nombre)
            );
            ?>
        </div>
    </div>

    <fieldset id="basic_info">
        <legend>Imagen:</legend>
        <div class="field_row clearfix">
            <?php echo form_label('Ruta Imagen:', 'path_imagen', array('class' => 'ssmall_wide')); ?>
            <div class='form_field'>
                <?php
                echo form_upload(array(
                    'name' => 'userfile',
                    'size' => 20
                ));
                ?>
            </div>
        </div>
        <div id="error_imagen"></div>
        <div class="field_row clearfix">
            <?php echo form_label('Imagen:', 'imagen', array('class' => 'ssmall_wide')); ?>
            <div class='form_field'>
                <img src="<?php echo base_url() . 'images/imglugar/' . $info->nombre_enlace . '/thumbs/' . $info->imagen_path ?>" width='80px' max-height= '100px'>
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
                'rows' => 3,
                'cols' => 18)
            );
            ?>
        </div>
    </div>
    
    <div class="field_row clearfix">
        <?php echo form_label('Orden:', 'orden', array('class' => 'ssmall_wide')); ?>
        <div class='form_field'>
            <?php
            echo form_input(array(
                'name' => 'orden',
                'id' => 'orden',
                'value' => $info->orden)
            );
            ?>
        </div>
    </div>

    <?php echo form_hidden('lugar_id', $id_lugar) ?>
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
    function getFileNames(){
        var files = document.getElementById("userfile").files;
        var names = "";
        for(var i = 0; i < files.length; i++)
            names += files[i].name + " ";
        alert(names);
    }
    
    //validation and submit handling
    $(document).ready(function()
    {	
        $.validator.addMethod("buga", function(value) {
//            var files = value.files;
//        var names = "";
//        for(var i = 0; i < files.length; i++)
//            names += files[i].name + " ";
//        alert(names);
//            if(value == null)
//                return -1 == <?php echo $id_lugar; ?>;
//            else
//                return false;
            		return value == "buga";
//            return false;
        }, 'Favor selecciona una imagen!');

        $('#form').validate({
            
            submitHandler:function(form)
            {			
                
                $(form).ajaxSubmit({
                    
                    success:function(response)
                    {
//                        getFileNames(); 
                        if(response.success == 'fail_upload')
                        {
                            $('#error_imagen').html(response.message);
                            return;
                        }
                        tb_remove();
                        post_foto_form_submit(response);
                    },
                    dataType:'json'
                });

            },
            errorLabelContainer: "#error_message_box",
            wrapper: "li",
            rules:
                {
                nombre:"required"
//                userfile:"buga"
            },
            messages:
                {
                nombre:"Nombre Requerido",
                //                userfile:"Imagen Requerida"
            }
        });
    });
</script>

