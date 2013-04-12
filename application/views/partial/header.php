<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico" />
        <title>RutasMobiles-Administraci&oacute;n</title>

        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <!--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>-->

        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>js/admin/thickbox.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <script src="<?php echo base_url(); ?>js/admin/manage_tables.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <!--<script src="<?php echo base_url(); ?>js/jquery.metadata.js" type="text/javascript" language="javascript" charset="UTF-8"></script>-->

<!--<script src="<?php echo base_url(); ?>js/DataTables-1.9.0/media/js/jquery.dataTables.js" type="text/javascript" language="javascript" charset="UTF-8"></script>-->
<!--<script src="<?php echo base_url(); ?>js/admin/datatables/js/jquery.dataTables.js" type="text/javascript" language="javascript" charset="UTF-8"></script>-->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" type="text/javascript" language="javascript" charset="UTF-8"></script>-->
<!--	<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables_themeroller.css" type="text/javascript" language="javascript" charset="UTF-8"></script>-->

        <script src="<?php echo base_url(); ?>js/admin/common.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
<!--	<script src="<?php echo base_url(); ?>js/jquery.color.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <script src="<?php echo base_url(); ?>js/swfobject.js" type="text/javascript" language="javascript" charset="UTF-8"></script>-->

        <script src="<?php echo base_url(); ?>js/admin/jquery.autocomplete.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <!--<script src="<?php echo base_url(); ?>js/jquery.bgiframe.js" type="text/javascript" language="javascript" charset="UTF-8"></script>-->


<!--<script src="<?php echo base_url(); ?>js/highchart/highcharts.js" type="text/javascript"></script>-->


        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url(); ?>css/admin/rm.css" />
        <!--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />-->
    </head>
    <body>
        <div id="menubar">
            <div id="menubar_container">
                <div id="menubar_company_info">
                <!--<img src="<?php echo base_url(); ?>images/logo.png"/>-->
                <!--<span id="company_title"><?php echo $this->config->item('company'); ?></span><br />-->

                    <span id="company_title">Administraci&oacute;n</span>
                    <br/>
                    <span style='font-size:8pt;'>RUTAS Móbiles</span>
                    <!--</div>-->
                </div>
                <div id="menubar_navigation">
                    <div class="menu_item">
                        <a href="<?php echo site_url('home'); ?>">
                            <img src="<?php echo base_url() . 'images/administracion/home.png'; ?>" border="0" alt="Menubar Image" /></a><br />
                        <a href="<?php echo site_url("home"); ?>">Inicio</a>
                    </div>

                    <?php
                    if (isset($allowed_modules)) {
                        foreach ($allowed_modules->result() as $modulo) {
                            if($modulo->modulo_id=='lugares' ||$modulo->modulo_id=='fotos')
                                continue;
                            ?>

                            <div class="menu_item">
                                <a href="<?php echo site_url("$modulo->modulo_id"); ?>">
                                    <img src="<?php echo base_url() . 'images/administracion/' . $modulo->modulo_id . '.png'; ?>" border="0" alt="Menubar Image" /></a><br />
                                <a href="<?php echo site_url("$modulo->modulo_id"); ?>"><?php echo $this->lang->line("modulo_" . $modulo->modulo_id) ?></a>
                            </div>
        <?php
    }
}
?>
                </div>

                <div id="menubar_footer">
<?php echo $this->lang->line('comun_welcome') . " $user_info->nombre $user_info->apellido! | "; ?>
                    <?php echo anchor("home/logout", 'Salir'); ?>
                </div>

                <div id="menubar_date">
                    <span style='font-size:8pt;'>
<?php echo strftime("%d de %B del %Y %H:%M"); //echo date('F d, Y h:i a'); ?>
                        <?php //echo strftime("%A %d de %B del %Y %H:%M"); //echo date('F d, Y h:i a'); ?>
                        <?php //echo date('d-m-Y h:i a') ?>
                    </span>
                </div>

            </div>
        </div>
<?php //echo getCwd(); ?>
        <div id="content_area_wrapper">
            <div id="content_area">