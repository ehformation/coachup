<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Page</span>
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section class="page-single">
  <div class="container">
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="page-thumb"><?php the_post_thumbnail('large'); ?></div>
    <?php endif; ?>
    <?php the_content(); ?>
  </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
