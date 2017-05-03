<!DOCTYPE HTML>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<?php $wtc_communications = get_option('wtc_communications'); ?>
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="noindex">
    <meta name="format-detection" content="telephone=no">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php bloginfo('template_url'); ?>/images/favicon/manifest.json">
    <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon/favicon.ico">
    <meta name="msapplication-config" content="<?php bloginfo('template_url'); ?>/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css">
    <link rel='stylesheet' href="<?php bloginfo('template_url'); ?>/css/main.css" type="text/css" media='all' />
    <link rel='stylesheet' href="<?php bloginfo('template_url'); ?>/css/media.css" type="text/css" media='all' />


    <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/libs/jquery.min.js'></script>
    <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/libs/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/bootstrap-select.min.js'></script>
    <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js'></script>
    <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/scripts.js'></script>

    <!--[if lt IE 9]>
    <script type='text/javascript' src='js/libs/html5shiv.min.js"></script>
    <script type='text/javascript' src='js/libs/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="header_inner clearfix">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Zen Appliance"></a>
        </div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".header_menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="header_nav_block">
            <div class="header_phone">
                <span>call now</span>
                <a href="tel:+1<?php echo wtc_generate_tel($wtc_communications['phone']); ?>"><?php echo $wtc_communications['phone']; ?></a>
            </div>
            <div class="header_search">
                <div class="header_search_open"><span class="glyphicon glyphicon-search"></span></div>
                <?php echo get_search_form(); ?>
            </div>
            <nav class="header_menu navbar-collapse collapse">
                <?php
                if (has_nav_menu('top_menu')) :
                    wp_nav_menu(array('theme_location' => 'top_menu'));
                endif;
                ?>
            </nav>
        </div>

    </div>
</header>
<?php  if( !is_front_page() and function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb('<div class="breadcrumbs"><div class="container">','</div></div>');
} ?>