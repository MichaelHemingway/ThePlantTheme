<!doctype html>
<html <?php language_attributes(); ?>class="no-js">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">

    <title>
        <?php wp_title( ''); ?>
        <?php if(wp_title( '', false)) { echo ' :'; } ?>
        <?php bloginfo( 'name'); ?>
    </title>

    <link href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/touch.png" rel="apple-touch-icon-precomposed">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400' rel='stylesheet' type='text/css'>

    <?php wp_head(); ?>
    <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->