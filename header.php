<!doctype html>
<html <?php language_attributes(); ?>class="no-js">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
    <meta name="theme-color" content="#1C5139">

    <title>
        <?php wp_title( ''); ?>
        <?php if(wp_title( '', false)) { echo ' :'; } ?>
        <?php bloginfo( 'name'); ?>
    </title>

    <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/touch.png" rel="apple-touch-icon-precomposed">
    <!-- <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400' rel='stylesheet' type='text/css'> -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather:900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="global-header" class="header transition u-noselect">

      <span id="nav-trigger" class="nav-trigger">Menu<span></span></span>

        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" class="logo transition">
            <img src="<?php echo get_theme_mod( 'plant_header_logo');?>" alt="Logo" class="logo-img">
        </a>
        <!-- /Logo -->

        <!-- Nav & Search -->
        <nav id="nav-container" class="nav-container">
            <?php //get_template_part( 'searchform'); ?>
            <ul class="nav u-list-none">
                <li class="nav-element bg-voices">
                    <a itemprop="url" href="<?php $cat_id = get_cat_ID( 'voices' );
                  $cat_link = get_category_link( $cat_id );
                  echo $cat_link; ?>">Voices</a>
                </li>
                <li class="nav-element bg-news">
                    <a itemprop="url" href="<?php $cat_id = get_cat_ID( 'news' );
                  $cat_link = get_category_link( $cat_id );
                  echo $cat_link; ?>">News</a>
                </li>

                <li class="nav-element bg-arts">
                    <a itemprop="url" href="
            <?php $cat_id = get_category_by_slug('arts');
                $id = $cat_id->term_id;
                $cat_link = get_category_link( $id );
                echo $cat_link; ?>
            ">Arts &amp; Culture</a>
                </li>
                <li class="nav-element bg-sports">
                    <a itemprop="url" href="<?php $cat_id = get_cat_ID('sports');
                  $cat_link = get_category_link( $cat_id );
                  echo $cat_link; ?>">Sports</a>
                </li>
                <li class="nav-element bg-science">
                    <a itemprop="url" href="<?php $cat_id = get_cat_ID('science');
                  $cat_link = get_category_link( $cat_id );
                  echo $cat_link; ?>">Science</a>
                </li>
                <li class="nav-element bg-curiosities">
                    <a itemprop="url" href="<?php $cat_id = get_cat_ID('curiosities');
                  $cat_link = get_category_link( $cat_id );
                  echo $cat_link; ?>">Curiosities</a>
                </li>
            </ul>
        </nav>
        <!-- /nav & search -->
    </header>
    <div id="dismiss-overlay" class="hidden"></div>
    <div class="wrapper">