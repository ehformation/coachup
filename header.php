<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo get_bloginfo('name') ?> - <?php echo get_bloginfo('description'); ?></title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- Theme styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/theme-custom.css">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- ============ HEADER ============ -->
  <header class="site-header">
    <div class="container">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <span class="logo-mark">C</span> <?php echo get_bloginfo('name'); ?>
      <?php endif; ?>

      <nav class="main-nav">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'principal',
            'container'      => false,
            'menu_class'     => 'menu',
          ));
        ?>
      </nav>
    </div>
  </header>
