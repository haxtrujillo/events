<?php
/**
* Visita - Header Template
*
* @file header.php
* @package visita
* @author Hafid Trujillo
* @copyright 2010-2020 Xpark Media
* @version release: 1.0.0
* @filesource  wp-content/themes/visita/header.php
* @since available since 0.1.0
*/
?>
<!doctype html>
<!--[if IE 8 ]> <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]>--> <html class="no-js" <?php language_attributes(); ?>> <!--[endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />

<meta name="theme-color" content="#200d35" />
<meta name="MobileOptimized" content="width" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<?php visita_site_metatags(); ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="manifest" href="<?php stylesheet_directory_uri('/manifest.json') ?>">
<link rel="shortcut icon" sizes="192x192" href="<?php stylesheet_directory_uri('/icons/icon-192.png') ?>">
<link rel="apple-touch-icon icon" sizes="72x72" href="<?php stylesheet_directory_uri('/icons/icon-72.png') ?>" />
<link rel="apple-touch-icon icon" sizes="114x114" href="<?php stylesheet_directory_uri('/icons/icon-114.png') ?>" />
<link rel="apple-touch-icon icon" sizes="192x192" href="<?php stylesheet_directory_uri('/icons/icon-192.png') ?>" />

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php visita_before_page(); ?>

<div itemscope itemtype="http://schema.org/WebPage" class="page">

  <header itemscope itemtype="http://schema.org/WPHeader" class="header">

    <div class="row">
      <div class="small-12 columns">

        <div class="site-logo">
          <a href="<?php echo home_url() ?>" title="<?php esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
          <a href="<?php echo esc_url(__('/en/las-vegas-weather/', 'visita' ))?>" class="weather" rel="bookmark" aria-hidden="true">
            <?php esc_html_e( 'Weather', 'visita' ) ?>
          </a>
        </div>

        <form action="<?php echo home_url() ?>" class="search-form" method="get">
          <label class="screen-reader-text" for="topsearch"><?php esc_html_e( 'Search', 'visita' ) ?></label>
          <input id="topsearch" type="search" class="search-field" name="s" /><button type="submit" class="button" title="<?php esc_html_e( 'Search', 'visita' ) ?>">
            <i class="fa fa-search"></i>
          </button>
          <button type="button" class="button" title="<?php esc_html_e( 'Advaced Search', 'visita' ) ?>" data-open="search-advanced">
            <i class="fa fa-sliders"></i>
          </button>
        </form>

        <?php get_template_part( 'parts/search', 'advanced' ); ?>

      </div>
    </div> <!--.row  -->

    <nav id="nav" class="text-left">
      <div class="row">
        <a class="screen-reader-text skip-link" href="#main" role="button" rel="nofollow" title="<?php esc_attr_e( 'Skip to content', 'visita' ) ?>"><?php esc_html_e( 'Skip to content', 'visita' ) ?></a>
        <div class="menu-toggle"><a href="#main-menu" rel="nofollow"><?php esc_html_e( 'Menu', 'visita' ) ?></a></div>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'id' => 'menu-main', 'menu_class' => 'menu-main' ) ); ?>
      </div> <!--.row  -->
    </nav><!--#nav-->

  </header> <!--.header  -->

  <main class="main">
