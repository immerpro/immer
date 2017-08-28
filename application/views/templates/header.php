<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="<?php echo base_url() ?>public/img/IconoImmer.ico">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $titulo; ?></title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <?php echo link_tag('public/css/font-awesome/css/font-awesome.min.css'); ?>
        <?php echo link_tag('public/css/bootstrap.min.css'); ?>
        <?php echo link_tag('public/css/mdb.min.css'); ?>
        <?php echo link_tag('public/css/style.css'); ?>
        <?php echo link_tag('public/jqueryUI/jquery-ui.min.css'); ?>
        <?php echo link_tag('public/alerta/themes/alertify.core.css'); ?>
        <?php echo link_tag('public/alerta/themes/alertify.default.css'); ?>
        <script type="text/javascript" src="<?PHP echo base_url() ?>public/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?PHP echo base_url() ?>public/js/parsley.min.js"></script>
        <script type="text/javascript" src="<?PHP echo base_url() ?>public/js/es.js"></script>
        <script type="text/javascript" src="<?PHP echo base_url() ?>public/alerta/lib/alertify.js"></script>
        <script type="text/javascript" src="<?PHP echo base_url() ?>public/jqueryUI/jquery-ui.min.js"></script>

        <?php // echo link_tag('public/css/bootstrap-social/bootstrap-social.css'); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#categoria").change(function () {
                    $("#categoria option:selected").each(function () {
                        categoria = $('#categoria').val();
        $.post("http://localhost/immer/ProductoController/asociarCategoria_a_subcategoria", {categoria: categoria}, function (data) {
        $("#subcatego").html(data);
        });
        });
        })
        });
        </script>
</head>




