<?php get_header(); ?>

<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Archive</span>
    <h1><?php the_archive_title(); ?></h1>
    <?php if ( get_the_archive_description() ) : ?>
      <p><?php echo get_the_archive_description(); ?></p>
    <?php endif; ?>
  </div>
</section>

<section class="coachings-section">
  <div class="container">
    <?php if ( have_posts() ) : ?>
      <div class="coachings-grid">
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="coaching-card">
            <div class="coaching-thumb" style="background: linear-gradient(135deg, #6366F1, #F59E0B);">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium_large', array('style' => 'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;')); ?>
              <?php endif; ?>
            </div>
            <div class="coaching-body">
              <div class="coaching-meta">
                <span>📅 <?php echo get_the_date(); ?></span>
                <span>✍ <?php the_author(); ?></span>
              </div>
              <h3><?php the_title(); ?></h3>
              <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
              <div class="coaching-footer">
                <a href="<?php the_permalink(); ?>" class="btn btn-ghost" style="padding: 10px 20px; font-size: .85rem;">Lire plus</a>
                <a href="<?php the_permalink(); ?>" class="coaching-cta">→</a>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
      <?php
        the_posts_pagination(array(
            'mid_size'  => 2,
            'prev_text' => '← Précédent',
            'next_text' => 'Suivant →',
        ));
    ?>
    <?php else : ?>
      <p style="text-align:center; color: var(--gray-500); padding: 64px 0;">Aucun article trouvé.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
