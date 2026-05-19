<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();
  $cat = get_the_category();
  $cat_name = $cat ? $cat[0]->name : 'Article';
  $initial = strtoupper(substr(get_the_author(), 0, 1));
?>

<!-- ============ ARTICLE HERO ============ -->
<section class="article-hero">
  <div class="container">
    <div class="breadcrumb" style="justify-content: center;">
      <a href="<?php echo home_url(); ?>">Accueil</a> /
      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a> /
      <span style="color: var(--dark);"><?php the_title(); ?></span>
    </div>
    <span class="category"><?php echo esc_html($cat_name); ?></span>
    <h1><?php the_title(); ?></h1>
    <div class="article-meta">
      <span class="author-mini"><?php echo esc_html($initial); ?></span>
      <span><strong style="color: var(--dark);"><?php the_author(); ?></strong></span>
      <span>·</span>
      <span><?php echo get_the_date(); ?></span>
      <span>·</span>
      <span><?php echo max(1, round(str_word_count(strip_tags(get_the_content())) / 200)); ?> min de lecture</span>
    </div>
  </div>
</section>

<?php if ( has_post_thumbnail() ) : ?>
<div class="article-cover">
  <div class="article-cover-img">
    <?php the_post_thumbnail('full', array('style' => 'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;')); ?>
  </div>
</div>
<?php endif; ?>

<!-- ============ ARTICLE CONTENT ============ -->
<article class="article-content">
  <?php the_content(); ?>

  <div class="article-share">
    <span>Partager :</span>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" class="share-btn" target="_blank" rel="noopener">f</a>
    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" class="share-btn" target="_blank" rel="noopener">in</a>
    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" class="share-btn" target="_blank" rel="noopener">𝕏</a>
    <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="share-btn">✉</a>
  </div>
</article>

<!-- ============ CTA ============ -->
<section>
  <div class="container">
    <div class="cta-strip">
      <div class="inner">
        <div>
          <span class="eyebrow" style="color: var(--accent);">Passe à la pratique</span>
          <h2>Travaille avec un coach.</h2>
          <p>Réserve un appel découverte de 30 minutes, offert et sans engagement.</p>
        </div>
        <a href="<?php echo get_post_type_archive_link('coaching'); ?>" class="btn btn-accent">Voir nos coachings →</a>
      </div>
    </div>
  </div>
</section>

<?php
  // Articles similaires
  $related = new WP_Query(array(
    'posts_per_page' => 3,
    'post__not_in'   => array(get_the_ID()),
    'category__in'   => $cat ? array($cat[0]->term_id) : array(),
  ));
  if ( $related->have_posts() ) :
    $gradients = array(
      'linear-gradient(135deg, #F97316, #FACC15)',
      'linear-gradient(135deg, #EC4899, #8B5CF6)',
      'linear-gradient(135deg, #FB7185, #F59E0B)',
    );
    $i = 0;
?>
<section style="background: var(--gray-50);">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Pour aller plus loin</span>
      <h2>Articles similaires.</h2>
    </div>
    <div class="articles-grid">
      <?php while ( $related->have_posts() ) : $related->the_post();
        $rc = get_the_category();
        $rc_name = $rc ? $rc[0]->name : 'Article';
        $r_initial = strtoupper(substr(get_the_author(), 0, 1));
        $bg = $gradients[$i % count($gradients)];
      ?>
        <article class="article-card">
          <div class="article-thumb" style="background: <?php echo esc_attr($bg); ?>;">
            <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
          </div>
          <div class="article-body">
            <span class="article-category"><?php echo esc_html($rc_name); ?></span>
            <h3><a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a></h3>
            <p><?php echo wp_trim_words(get_the_excerpt(), 16); ?></p>
            <div class="article-meta">
              <span class="author-mini"><?php echo esc_html($r_initial); ?></span>
              <span><?php the_author(); ?></span>
              <span>· <?php echo get_the_date('j M'); ?></span>
            </div>
          </div>
        </article>
      <?php $i++; endwhile; ?>
    </div>
  </div>
</section>
<?php endif; wp_reset_postdata(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
