<?php get_header(); ?>

<!-- ============ PAGE HERO ============ -->
<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Catalogue</span>
    <h1>Trouve le coaching qui te ressemble.</h1>
    <p>Explore nos programmes par thématique et démarre dès aujourd'hui une transformation guidée par des experts certifiés.</p>

    <div class="filters">
      <a class="filter-chip active" href="<?php echo get_post_type_archive_link('coaching'); ?>">Tous</a>
      <?php
        $terms = get_terms(array('taxonomy' => 'type-coaching', 'hide_empty' => true));
        if ( $terms && !is_wp_error($terms) ) :
          foreach ( $terms as $term ) :
      ?>
        <a class="filter-chip" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
      <?php endforeach; endif; ?>
    </div>
  </div>
</section>

<!-- ============ COACHINGS LIST ============ -->
<section class="coachings-section">
  <div class="container">
    <div class="coachings-toolbar">
      <div class="count"><strong><?php echo intval($GLOBALS['wp_query']->found_posts); ?></strong> coaching<?php echo $GLOBALS['wp_query']->found_posts > 1 ? 's' : ''; ?> disponible<?php echo $GLOBALS['wp_query']->found_posts > 1 ? 's' : ''; ?></div>
    </div>

    <?php if ( have_posts() ) : ?>
      <div class="coachings-grid">
        <?php
          $gradients = array(
            'linear-gradient(135deg, #6366F1, #F59E0B)',
            'linear-gradient(135deg, #FB7185, #F59E0B)',
            'linear-gradient(135deg, #10B981, #6366F1)',
            'linear-gradient(135deg, #818CF8, #06B6D4)',
            'linear-gradient(135deg, #F97316, #FACC15)',
            'linear-gradient(135deg, #EC4899, #8B5CF6)',
          );
          $i = 0;
          while ( have_posts() ) : the_post();
            $duree = get_post_meta(get_the_ID(), 'duree', true);
            $prix  = get_post_meta(get_the_ID(), 'prix', true);
            $types = get_the_terms(get_the_ID(), 'type-coaching');
            $type_label = ($types && !is_wp_error($types)) ? $types[0]->name : 'Coaching';
            $bg = $gradients[$i % count($gradients)];
        ?>
          <article class="coaching-card">
            <div class="coaching-thumb" style="background: <?php echo esc_attr($bg); ?>;">
              <span class="badge"><?php echo esc_html($type_label); ?></span>
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium_large', array('style' => 'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:.85;mix-blend-mode:multiply;')); ?>
              <?php endif; ?>
            </div>
            <div class="coaching-body">
              <div class="coaching-meta">
                <?php if ($duree) : ?><span>⏱ <?php echo esc_html($duree); ?></span><?php endif; ?>
              </div>
              <h3><?php the_title(); ?></h3>
              <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
              <div class="coaching-footer">
                <div class="price"><?php echo $prix ? esc_html($prix) : 'Sur devis'; ?></div>
                <a href="<?php the_permalink(); ?>" class="coaching-cta">→</a>
              </div>
            </div>
          </article>
        <?php $i++; endwhile; ?>
      </div>
    <?php else : ?>
      <p style="text-align:center; color: var(--gray-500); padding: 64px 0;">Aucun coaching trouvé pour le moment.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
