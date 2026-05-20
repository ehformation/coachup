<?php get_header(); ?>

<?php $current_term = get_queried_object(); ?>

<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Type de coaching</span>
    <h1><?php echo esc_html($current_term->name); ?></h1>
    <?php if ( $current_term->description ) : ?>
      <p><?php echo esc_html($current_term->description); ?></p>
    <?php endif; ?>

    <div class="filters">
      <a class="filter-chip" href="<?php echo get_post_type_archive_link('coaching'); ?>">Tous</a>
      <?php
        $terms = get_terms(array('taxonomy' => 'type-coaching', 'hide_empty' => true));
        if ( $terms && !is_wp_error($terms) ) :
          foreach ( $terms as $term ) :
            $active = ($term->term_id === $current_term->term_id) ? ' active' : '';
      ?>
        <a class="filter-chip<?php echo $active; ?>" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
      <?php endforeach; endif; ?>
    </div>
  </div>
</section>

<section class="coachings-section">
  <div class="container">
    <div class="coachings-toolbar">
      <div class="count"><strong><?php echo intval($GLOBALS['wp_query']->found_posts); ?></strong> coaching<?php echo $GLOBALS['wp_query']->found_posts > 1 ? 's' : ''; ?></div>
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
            $bg = $gradients[$i % count($gradients)];
        ?>
          <article class="coaching-card">
            <div class="coaching-thumb" style="background: <?php echo esc_attr($bg); ?>;">
              <span class="badge"><?php echo esc_html($current_term->name); ?></span>
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium_large', array('style' => 'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:.85;mix-blend-mode:multiply;')); ?>
              <?php endif; ?>
            </div>
            <div class="coaching-body">
              <div class="coaching-meta">
                <?php if ($duree) : ?><span>⏱ <?php echo esc_html($duree); ?></span><?php endif; ?>
                <?php
                $niveaux = get_the_terms(get_the_ID(), 'niveau');
                $icones  = array(
                    'facile'      => '🌱',
                    'intermediaire' => '🔥',
                    'difficile'     => '⚡',
                );
                ?>
                <?php if ($niveaux && !is_wp_error($niveaux)) :
                $slug = $niveaux[0]->slug;
                $ico  = isset($icones[$slug]) ? $icones[$slug] : '📊';
                ?>
                <span><?php echo $ico; ?> <?php echo esc_html($niveaux[0]->name); ?></span>
                <?php endif; ?>

                <?php $lieu = get_post_meta(get_the_ID(), 'lieu', true); ?>
                <?php if ($lieu) : ?>
                <span>📍 <?php echo esc_html($lieu); ?></span>
                <?php endif; ?>
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
      <?php
        the_posts_pagination(array(
            'mid_size'  => 2,
            'prev_text' => '← Précédent',
            'next_text' => 'Suivant →',
        ));
    ?>
    <?php else : ?>
      <p style="text-align:center; color: var(--gray-500); padding: 64px 0;">Aucun coaching trouvé pour cette catégorie.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
