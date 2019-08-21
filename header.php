<!DOCTYPE html>
<html dir="ltr" <?php language_attributes(); ?>>
<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Alan Wesley de Souza" />

  <!-- Stylesheets
  ============================================= -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css" type="text/css" />
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/dark.css" type="text/css" />
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/font-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/magnific-popup.css" type="text/css" />
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/swiper.css" type="text/css" />

  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/responsive.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Document Title
  ============================================= -->
  <title><?php echo get_titulo(); ?></title>

  <?php wp_head(); ?>

</head>

<body class="stretched">

  <!-- Document Wrapper
  ============================================= -->
  <div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="full-header">

      <div id="header-wrap">

        <div class="container clearfix">

          <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

          <!-- Logo
          ============================================= -->
          <div id="logo">
            <a href="<?= get_option('home'); ?>" class="standard-logo" data-dark-logo="<?= get_template_directory_uri(); ?>/images/roteiro.png"><img src="<?= get_template_directory_uri(); ?>/images/roteiro.png" alt="Canvas Logo"></a>
            <a href="<?= get_option('home'); ?>" class="retina-logo" data-dark-logo="<?= get_template_directory_uri(); ?>/images/roteiro.png"><img src="<?= get_template_directory_uri(); ?>/images/roteiro.png" alt="Canvas Logo"></a>
          </div><!-- #logo end -->

          <!-- Primary Navigation
          ============================================= -->
          <nav id="primary-menu">
            <!-- Top Search
            ============================================= -->
            <div id="top-search">
              <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>

              <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                  <input class="form-control" type="text" id="s" name="s" value="<?php echo get_search_query() ?>" placeholder="Digite algo para pesquisar..." >
              </form>

            </div><!-- #top-search end -->

          </nav><!-- #primary-menu end -->

        </div>

      </div>

    </header><!-- #header end -->

