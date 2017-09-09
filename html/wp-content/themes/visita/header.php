<?php
/**
* Visita - Header Template
*
* @file header.php
* @package visita
* @author Hafid Trujillo
* @copyright 2010-2018 Xpark Media
* @version release: 1.0.0
* @filesource  wp-content/themes/visita/header.php
* @since available since 0.1.0
*/
?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]>--> <html class="no-js" <?php language_attributes(); ?>> <!--[endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />

<meta name="theme-color" content="#200d35" />
<meta name="MobileOptimized" content="width" />
<meta name="mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<?php visita_site_metatags(); ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="manifest" href="<?php stylesheet_directory_uri('/manifest.json') ?>">
<link rel="apple-touch-icon icon" href="<?php stylesheet_directory_uri('/icons/icon-72.png') ?>" />
<link rel="apple-touch-icon icon" sizes="72x72" href="<?php stylesheet_directory_uri('/icons/icon-72.png') ?>" />
<link rel="apple-touch-icon icon" sizes="114x114" href="<?php stylesheet_directory_uri('/icons/icon-114.png') ?>" />
<link rel="apple-touch-icon icon" sizes="144x144" href="<?php stylesheet_directory_uri('/icons/icon-144.png') ?>" />
<link rel="apple-touch-icon icon" sizes="192x192" href="<?php stylesheet_directory_uri('/icons/icon-192.png') ?>" />
<link rel="shortcut icon" sizes="192x192" type="image/png" href="<?php stylesheet_directory_uri('/icons/favicon.png') ?>">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php visita_before_page(); ?>

<div class="page">

  <header class="header">

    <div class="row">
      <div class="small-12 columns">

        <h1 class="site-logo">
          <a href="/" title="<?php esc_attr( get_bloginfo( 'name' ) ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a>
        </h1>

        <form class="search-form" method="get">
          <div class="row collapse">
            <div class="small-10 columns">
              <input type="search" class="search-field" name="s" placeholder="<?php esc_attr_e('Search: events, shows, hotels...') ?>" />
            </div>
            <div class="small-2 columns">
              <button class="button expanded search-button">O</button>
            </div>
          </div>
        </form>

        <nav id="nav-social">
  				<a class="screen-reader-text" href="#nav" role="button" rel="nofollow" title="<?php esc_attr_e( 'Skip to navigation', 'visita' ) ?>"><?php esc_html_e( 'Skip to top navigation', 'visita' ) ?></a>
  				<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'menu menu-social align-center ', 'fallback_cb' => 'visita_default_social_menu' ) ); ?>
        </nav><!--#social-nav-->

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

  <main itemscope itemtype="http://schema.org/WebPage">
