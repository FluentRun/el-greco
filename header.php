<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" xmlns="http://www.w3.org/1999/html">
<head>
        <link rel="shortcut icon" href="<?php _cz( 'tp_favicon' ); ?>"/>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <?php
    global $ADSTM;
    if(isset($ADSTM[ 'product' ])) {
        $product = $ADSTM['product'];
        if (isset($product['gallery'][0]['full'])) {
            ?>
            <meta property="og:image" content="<?php echo $product['gallery'][0]['full']; ?>"/>
            <meta property="og:image:width" content="768"/>
            <meta property="og:image:height" content="768"/>
        <?php }
    }
    adsTmpl::box_meta();
    $adstm_theme = wp_get_theme();
    $version = $adstm_theme->get( 'Version' );
    ?>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <link  href="<?php echo get_template_directory_uri(); ?>/assets/css/head.css?ver=<?php echo $version; ?>" rel="stylesheet">



        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>    <![endif]-->

        <?php wp_head(); ?>

        <style>
                <?php echo cz('tp_style');?>
        </style>
        <?php echo cz( 'tp_head' ); ?>

        <link  href="<?php echo get_template_directory_uri(); ?>/assets/css/cal-theme.css?ver=<?php echo $version; ?>" rel="stylesheet">

    <?php $body_classes = [];

    $current_post_type = get_post_type(get_the_ID());
    $post_type_is_product = $current_post_type === 'product';

    if( cz( 'tp_item_imgs_lazy_load' ))
        array_push( $body_classes, 'js-items-lazy-load' );


    if (cz('tp_single_enable_pre_selected_variation')) {
        if ($post_type_is_product) {
            array_push($body_classes, 'js-show-pre-selected-variation');
        }
    }
    do_action('ads_head_addons');
    $template_dir = get_template_directory_uri();
    ?>
    <link rel="preload" href="<?php echo $template_dir; ?>/assets/fonts/ProximaNova-Regular.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="<?php echo $template_dir; ?>/assets/fonts/ProximaNova-Bold.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="<?php echo $template_dir; ?>/assets/fonts/ProximaNova-Semibold.woff" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="<?php echo $template_dir; ?>/assets/fonts/fontawesome-webfont.woff" as="font" type="font/woff" crossorigin>
    <script>
        ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
    </script>
    <?php if(cz('social_sharing') && (is_front_page() || is_home())){ ?>
        <meta property="og:image" content="<?php _cz('social_sharing') ?>" />
    <?php } ?>
</head>

<body <?php body_class($body_classes); ?>>

<div class="js-slideout-menu" >
    <div class="mobile-menu  js-mobile-menu">
        <div class="head-menu">
            <div class="link-home">
                <a class="name-home" href="/"><?php _e( 'Home', 'rap' ); ?></a>
                <a class="name-menu"><?php _e( 'Menu', 'rap' ); ?></a>
            </div>
            <div class="btn-close js-btn-close"></div>
        </div>

        <div class="category-menu">
            <ul class="menu-list">
                <?php do_action('ads_menu_product');?>
            </ul>
        </div>
        <div class="pages-menu">
                <?php do_action('ads_pages_menu'); ?>
        </div>
    </div>
</div>

<div class="wrap js-slideout-panel">
    <header class="cal-header">
        <div class="cal-header__utility">
            <div class="container cal-header__container">
                <div class="cal-header__utility-left">
                    <div class="pages-menu">
                        <?php do_action('ads_pages_menu'); ?>
                    </div>
                    <div class="text-shipping">
                        <?php if(cz('tp_text_top_header')){
                            do_action('adstm_shipping_icon');
                            echo cz('tp_text_top_header');
                        }  ?>
                    </div>
                </div>
                <div class="cal-header__utility-right">
                    <div class="box-active">
                        <?php do_action('adstm_loginButton') ?>
                    </div>

                    <?php if(cz('tp_currency_switcher')){ ?>
                        <div class="box-active box-active-currency">
                            <?php do_action('adstm_dropdown_currency') ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

        <div class="cal-header__main">
            <div class="container cal-header__container">
                <button type="button" class="visible-xs visible-sm navbar-toggle js-toggle-menu cal-header__toggle">
                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <div class="box-logo">
                    <?php do_action('adstm_logo_header') ?>
                </div>
                <div class="cal-header__search">
                    <div class="box box-search">
                        <?php do_action('adstm_search') ?>
                    </div>
                </div>
                <div class="cal-header__shipping hidden-xs">
                    <?php if(cz('tp_text_top_header')){
                        do_action('adstm_shipping_icon');
                        echo cz('tp_text_top_header'); }
                    ?>
                </div>
                <div class="cal-header__cart">
                    <?php do_action('adstm_cart_quantity_link') ?>
                </div>

            </div>
        </div>
        <div class="cal-header__nav hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="categories-menu-box col-xs-60">
                        <ul class="categories-menu-line">
                                                <?php ads_menu_product(4); ?>
                            <li class="more js-more parent-top"><a href="#"><?php _e('More', 'rap'); ?></a></li>
                        </ul>
                    </div>
                    <div class="box-categories-menu-sub">
                        <div class="menu-sub-wrap">
                            <div class="box-menu">
                                <div class="menu menu-1"><ul></ul></div>
                                <div class="menu menu-2">
                                    <ul></ul>
                                    <div class="wrap-product wrap-product-2">
                                        <div class="product product1">
                                            <a href="">
                                                <div class="item">
                                                    <div class="box-img"><img  src=""></div>
                                                    <div class="box-title"><div class="text"></div></div>
                                                </div></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu menu-3">
                                    <ul></ul>
                                    <div class="wrap-product wrap-product-3">
                                        <div class="product product1">
                                            <a href="">
                                                <div class="item">
                                                    <div class="box-img"><img  src=""></div>
                                                    <div class="box-title"><div class="text"></div></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product product2">
                                            <a href="">
                                                <div class="item">
                                                    <div class="box-img"><img  src=""></div>
                                                    <div class="box-title"><div class="text"></div></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product product3">
                                            <a href="">
                                                <div class="item">
                                                    <div class="box-img"><img  src=""></div>
                                                    <div class="box-title"><div class="text"></div></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu menu-4">
                                    <ul></ul>
                                    <div class="wrap-product wrap-product-4">
                                        <div class="product product1">
                                            <a href="">
                                                <div class="item">
                                                    <div class="box-img"><img  src=""></div>
                                                    <div class="box-title"><div class="text"></div></div>
                                                </div></a>
                                        </div>
                                        <div class="product product2">
                                            <a href="">
                                                <div class="item">
                                                    <div class="box-img"><img  src=""></div>
                                                    <div class="box-title"><div class="text"></div></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="categories-menu-bg"></div>
    </header>
<?php get_template_part( 'template/str_data_common' ); ?>
