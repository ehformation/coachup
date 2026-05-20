<?php get_header(); ?>

<!-- ============ PAGE HERO ============ -->
<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Le journal CoachUp</span>
    <h1>Inspirations &amp; ressources.</h1>
    <p>Conseils, méthodes et témoignages pour t'accompagner dans ta transformation, écrits par nos coachs.</p>

    <div class="filters">
      <a class="filter-chip active" href="<?php echo get_permalink( get_option('page_for_posts') ); ?>">Tous</a>
      <?php
        $cats = get_categories(array('hide_empty' => true));
        foreach ( $cats as $cat ) :
      ?>
        <a class="filter-chip" href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
  // Article à la une = le plus récent
  $featured_query = new WP_Query(array('posts_per_page' => 1));
  if ( $featured_query->have_posts() ) : $featured_query->the_post();
    $cat = get_the_category();
    $cat_name = $cat ? $cat[0]->name : '';
?>
<section class="coachings-section" style="padding-bottom: 32px;">
  <div class="container">
    <article class="blog-featured">
      <div class="blog-featured-thumb">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail('large', array('style' => 'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;')); ?>
        <?php endif; ?>
      </div>
      <div class="blog-featured-body">
        <span class="category">À la une<?php echo $cat_name ? ' · ' . esc_html($cat_name) : ''; ?></span>
        <h2><?php the_title(); ?></h2>
        <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
        <div class="meta">
          <span>📅 <?php echo get_the_date(); ?></span>
          <span>✍ <?php the_author(); ?></span>
        </div>
        <div style="margin-top: 24px;">
          <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire l'article →</a>
        </div>
      </div>
    </article>
  </div>
</section>
<?php
    $featured_id = get_the_ID();
    wp_reset_postdata();
  else :
    $featured_id = 0;
  endif;
?>

<!-- ============ AUTRES ARTICLES ============ -->
<section class="coachings-section" style="padding-top: 32px;">
  <div class="container">
    <?php
      $others = new WP_Query(array(
        'posts_per_page' => 9,
        'post__not_in'   => $featured_id ? array($featured_id) : array(),
      ));
      $gradients = array(
        'linear-gradient(135deg, #6366F1, #F59E0B)',
        'linear-gradient(135deg, #FB7185, #F59E0B)',
        'linear-gradient(135deg, #10B981, #6366F1)',
        'linear-gradient(135deg, #818CF8, #06B6D4)',
        'linear-gradient(135deg, #F97316, #FACC15)',
        'linear-gradient(135deg, #EC4899, #8B5CF6)',
      );
      $i = 0;
    ?>
    <?php if ( $others->have_posts() ) : ?>
      <div class="articles-grid">
        <?php while ( $others->have_posts() ) : $others->the_post();
          $cat = get_the_category();
          $cat_name = $cat ? $cat[0]->name : 'Article';
          $bg = $gradients[$i % count($gradients)];
          $initial = strtoupper(substr(get_the_author(), 0, 1));
        ?>
          <article class="article-card">
            <div class="article-thumb" style="background: <?php echo esc_attr($bg); ?>;">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium_large'); ?>
              <?php endif; ?>
            </div>
            <div class="article-body">
              <span class="article-category"><?php echo esc_html($cat_name); ?></span>
              <h3><a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a></h3>
              <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
              <div class="article-meta">
                <span class="author-mini"><?php echo esc_html($initial); ?></span>
                <span><?php the_author(); ?></span>
                <span>· <?php echo get_the_date('j M'); ?></span>
              </div>
            </div>
          </article>
        <?php $i++; endwhile; ?>
      </div>
      <?php
        the_posts_pagination(array(
            'mid_size'  => 2,
            'prev_text' => '← Précédent',
            'next_text' => 'Suivant →',
        ));
    ?>
    <?php endif; wp_reset_postdata(); ?>
  </div>
</section>

<?php get_footer(); ?>
