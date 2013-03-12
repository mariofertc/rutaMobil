<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Rutas Móbiles - Lugares</title>
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
                <!--<link href="<?php echo base_url();?>js/jquery-mobile/jquery.mobile.theme-1.0.min.css" rel="stylesheet" type="text/css"/>-->
                <!--<script type="text/javascript" src="<?php echo base_url();?>js/jquery/jquery-1.7.1.min.js"></script>-->

		<style>
			body { font-size: 62.5%; }
			label, input { display:block; }
			input.text { margin-bottom:12px; width:95%; padding: .4em; }
			fieldset { padding:0; border:0; margin-top:25px; }
			h1 { font-size: 1.2em; margin: .6em 0; }
			div#users-contain { width: 350px; margin: 20px 0; }
			div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
			div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
			.ui-dialog .ui-state-error { padding: .3em; }
			.validateTips { border: 1px solid transparent; padding: 0.3em; }
		</style>
	</head>
	<body>





		<?php //echo chainselect_getcategories('taxonomy name'); ?>
		<div id="container">


			<div id="dialog-form" title="Create new user">
				<p class="validateTips">Todos los campos son requeridos.</p>

				<form>
					<fieldset>
						<label for="name">Nombre</label>
						<input type="text" name="nombre" id="nombre" class="text ui-widget-content ui-corner-all" />
						<label for="email">Descripción</label>
						<textarea style="width:313px" type="text" name="descripcion" id="descripcion" value="" class="textarea ui-widget ui-corner-all"></textarea>

						<!--						<label for="password">Password</label>
												<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />-->
					</fieldset>
				</form>
			</div>


			<h1>Bienvenido a Lugares de Rutas Móbiles!</h1>

			<div id="users-contain" class="ui-widget">
				<p>Administración de los Lugares.</p>
				<p>Provincia</p>
				<?php
				echo form_dropdown('cboProvincia', array(), '', 'id="cboProvincia"');
//				echo form_dropdown('cboProvincia', $provincia, '', 'id="cboProvincia"');
				?>

				<?php
				//echo anchor('lugares/provinciaView', 'Adherir', 'id=new-province') ;
//				echo anchor('#', 'Adherir', 'id=new-province') ;
				?>
				<button id="new-province">Nueva Provincia</button>
				<button id="edit-province">Editar</button>
				<button id="del-province">Borrar</button>

				<p>Ciudad</p>
				<?php
				echo form_dropdown('cboCiudad', array(), '', 'id="cboCiudad"');
				?>

				<p>Categoría</p>
				<?php
				echo form_dropdown('cboCategoria', array(), '', 'id="cboCategoria"');
				?>
				<p>Lugar</p>
				<?php
				echo form_dropdown('cboLugar', array(), '', 'id="cboLugar"');
				?>
				<? echo form_closed(); ?>



				<p><?php
				foreach ($lugares as $lugar
				)

				?>

				<div>
					<p>
						<?php echo $lugar->nombre; ?>
					</p>
				</div>
			</div>

			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>



		<!--<script lang="javascript" src="<?php // echo base_url()?>js/jquery-1.7.1"></script>-->

		<script  type='text/javascript'	lang="javascript">
			$(function() {
				$( "#dialog:ui-dialog" ).dialog( "destroy" );
				var nombre = $( "#nombre" ),
				descripcion = $( "#descripcion" ),
				allFields = $( [] ).add( nombre ).add( descripcion ),
				tips = $( ".validateTips" );
				function updateTips( t ) {
					tips
					.text( t )
					.addClass( "ui-state-highlight" );
					setTimeout(function() {
						tips.removeClass( "ui-state-highlight", 1500 );
					}, 500 );
				}

				function checkLength( o, n, min, max ) {
					if ( o.val().length > max || o.val().length < min ) {
						o.addClass( "ui-state-error" );
						updateTips( "El tamaño de " + n + " debe estar entre " +
							min + " y " + max + "." );
						return false;
					} else {
						return true;
					}
				}

				function checkRegexp( o, regexp, n ) {
					if ( !( regexp.test( o.val() ) ) ) {
						o.addClass( "ui-state-error" );
						updateTips( n );
						return false;
					} else {
						return true;
					}
				}
				$( "#dialog-form" ).dialog({
					autoOpen: false,
					height: 300,
					width: 350,
					modal: true,
					buttons: {
						"Create an account": function() {
							var bValid = true;
							allFields.removeClass( "ui-state-error" );

							bValid = bValid && checkLength( nombre, "Nombre de Provincia", 3, 16 );
							bValid = bValid && checkLength( descripcion, "Descripción", 6, 80 );

							bValid = bValid && checkRegexp( nombre, /^[a-z]([0-9a-z_ ])+$/i, "El nombre de la Provincia debe contener a-z, 0-9, lineas, empezando por una letra." );
							bValid = bValid && checkRegexp( descripcion, /^[a-z]([0-9a-z_ ])+$/i, "La descripción de la Provincia debe contener a-z, 0-9, lineas, empezando por una letra." );
							// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
							//bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
							//bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

							if ( bValid ) {
								//								$( "#users tbody" ).append( "<tr>" +
								//									"<td>" + nombre.val() + "</td>" +
								//									"<td>" + descripcion.val() + "</td>" +
								//									"</tr>" );
								$.post('dataSave',
								{
									nombre:nombre.val(),
									descripcion:descripcion.val(),
									id_provincia:1
								},
								function(data) {
									if(data.id)
									{
										$("#cboProvincia").append('<option value="' + data.id + '">'+data.nombre + '</option>');
										$('#cboProvincia').val(data.id);

										$("#cboProvincia").change();
									}
								},
								"json");


								$( this ).dialog( "close" );
							}
						},
						Cancel: function() {
							$( this ).dialog( "close" );
						}
					},
					close: function() {
						allFields.val( "" ).removeClass( "ui-state-error" );
					}
				});
				$( "#new-province" )
				.button()
				.click(function() {
					$( "#dialog-form" ).dialog( "open" );
				});
			});



			$(document).ready(function() {

				//caga la primera vez.
				$.post('dataLoad',
				{id:1},
				function(data) {
					$("#cboProvincia").empty();
					$.each(data, function(i, item){
						$("#cboProvincia").append(
						'<option value="' + item.id + '">'+item.nombre + '</option>'
					);
					})
					$("#cboProvincia").change();
				},
				"json");


				$(document).on('change', '#cboProvincia',function() {
					//alert("2");
					$("#cboCiudad").empty();
					$.post('dataLoad',
					{ id_provincia : $("#cboProvincia option:selected").val() },
					function(data) {
						$.each(data, function(i, item){
							$("#cboCiudad").append(
							'<option value="' + item.id + '">'+item.nombre + '</option>'
						);
						})
					},
					"json"
				);
				});
			});
		</script>
	</body>
</html>