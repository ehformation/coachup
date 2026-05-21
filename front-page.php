<?php get_header(); ?>
<section class="hero">
  <div class="container">
    <div class="hero-text">
      <span class="hero-badge"><span class="dot"></span> +250 coachs disponibles</span>
      <h1>Révèle <span class="accent">le meilleur de toi</span> avec un coach d'exception.</h1>
      <p class="hero-lead">Accélère ta progression personnelle et professionnelle grâce à des coachs certifiés, des programmes sur-mesure et un accompagnement humain au quotidien.</p>
      <div class="hero-actions">
        <?php get_search_form(); ?>
      </div>
       
      <div class="hero-actions">
        
        <a href="<?php echo get_post_type_archive_link('coaching'); ?>" class="btn btn-primary">Voir les coachings →</a>
        <a href="#decouvrir" class="btn btn-ghost">▶ Voir la démo</a>
      </div>
      <div class="hero-stats">
        <div class="hero-stat"><div class="num">12k+</div><div class="label">Sessions réalisées</div></div>
        <div class="hero-stat"><div class="num">98%</div><div class="label">Clients satisfaits</div></div>
        <div class="hero-stat"><div class="num">4.9★</div><div class="label">Note moyenne</div></div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="blob"></div>
      <div class="photo"></div>
      <div class="floating-card fc-1">
        <div class="icon indigo">⚡</div>
        <div><strong>+47%</strong><span>de productivité</span></div>
      </div>
      <div class="floating-card fc-2">
        <div class="icon amber">🏆</div>
        <div><strong>Objectif atteint</strong><span>en 6 semaines</span></div>
      </div>
    </div>
  </div>
</section>

<section id="decouvrir">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Pourquoi CoachUp</span>
      <h2>Une méthode pensée pour des résultats concrets.</h2>
      <p>Trois piliers pour transformer ta vision en victoires durables.</p>
    </div>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon">🎯</div>
        <h3>Objectifs sur-mesure</h3>
        <p>Un plan d'action personnalisé construit avec ton coach dès la première séance.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">📈</div>
        <h3>Progression mesurée</h3>
        <p>Suis ton évolution avec des indicateurs clairs et un feedback continu.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">🤝</div>
        <h3>Accompagnement humain</h3>
        <p>Une vraie relation de confiance, en visio ou en présentiel, à ton rythme.</p>
      </div>
    </div>
  </div>
</section>

<section style="background: var(--gray-50);">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Nos programmes</span>
      <h2>Découvre nos coachings phares.</h2>
    </div>
    <div class="coachings-grid">
      <?php
        $featured = new WP_Query(array(
          'post_type'      => 'coaching',
          'posts_per_page' => 3,
        ));
        $gradients = array(
          'linear-gradient(135deg, #6366F1, #F59E0B)',
          'linear-gradient(135deg, #FB7185, #F59E0B)',
          'linear-gradient(135deg, #10B981, #6366F1)',
        );
        $i = 0;
        while ( $featured->have_posts() ) : $featured->the_post();
          $duree = get_post_meta(get_the_ID(), 'duree', true);
          $prix  = get_post_meta(get_the_ID(), 'prix', true);
          $types = get_the_terms(get_the_ID(), 'type-coaching');
          $type_label = ($types && !is_wp_error($types)) ? $types[0]->name : 'Coaching';
          $bg = $gradients[$i % 3];
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
              <?php $niveaux = get_the_terms(get_the_ID(), 'niveau'); ?>
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
      <?php $i++; endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<section class="coachings-section" style="padding-top: 32px;">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Nos conseils</span>
      <h2>Le blog pour booster ta réussite.</h2>
      <p>Des articles inspirants, des astuces pratiques et des interviews exclusives pour t'accompagner à chaque étape de ton parcours.</p>
    </div>
    <?php
      $others = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'post',
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
    <?php endif; wp_reset_postdata(); ?>
  </div>
</section>

<?php get_footer(); ?>