<?php get_header(); ?>

<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Résultats de recherche</span>
    <h1>
      <?php if (have_posts()) : ?>
        Résultats pour « <?php echo get_search_query(); ?> »
      <?php else : ?>
        Aucun résultat
      <?php endif; ?>
    </h1>
    <p><strong><?php echo $GLOBALS['wp_query']->found_posts; ?></strong> résultat(s)</p>

    <div style="margin-top: 32px;">
      <?php get_search_form(); ?>
    </div>
  </div>
</section>

<section class="coachings-section">
  <div class="container">
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
      <p style="text-align:center; color: var(--gray-500); padding: 64px 0;">Aucun coaching trouvé pour le moment.</p>
    <?php endif; ?>

  </div>
</section>


<?php get_footer(); ?>
