<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();
  $duree = get_post_meta(get_the_ID(), 'duree', true);
  $prix  = get_post_meta(get_the_ID(), 'prix', true);
  $types = get_the_terms(get_the_ID(), 'type-coaching');
  $type_label = ($types && !is_wp_error($types)) ? $types[0]->name : 'Coaching';
  $niveaux = get_the_terms(get_the_ID(), 'niveau');
  $lieu    = get_post_meta(get_the_ID(), 'lieu', true);
?>

<!-- ============ DETAIL HERO ============ -->
<section class="detail-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?php echo home_url(); ?>">Accueil</a> /
      <a href="<?php echo get_post_type_archive_link('coaching'); ?>">Coachings</a> /
      <span style="color: var(--dark);"><?php the_title(); ?></span>
    </div>

    <div class="detail-grid">
      <div class="detail-visual">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail('large', array('style' => 'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;')); ?>
        <?php endif; ?>
      </div>

      <div class="detail-content">
        <span class="tag"><?php echo esc_html($type_label); ?> · Programme certifié</span>
          <?php
          $niveaux = get_the_terms(get_the_ID(), 'niveau');
          if ($niveaux && !is_wp_error($niveaux)) :
            $map = array(
              'facile'      => array('ico' => '🌱', 'class' => 'niveau-facile'),
              'intermediaire' => array('ico' => '🔥', 'class' => 'niveau-intermediaire'),
              'difficile'        => array('ico' => '💪', 'class' => 'niveau-difficile'),
            );
            $slug = $niveaux[0]->slug;
            $n = isset($map[$slug]) ? $map[$slug] : array('ico' => '📊', 'class' => '');
        ?>
          <span class="tag <?php echo esc_attr($n['class']); ?>">
            <?php echo $n['ico']; ?> <?php echo esc_html($niveaux[0]->name); ?>
          </span>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <p class="lead"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>

        <div class="info-pills">
          <div class="info-pill">
            <div class="label">⏱ Durée</div>
            <div class="value"><?php echo $duree ? esc_html($duree) : '—'; ?></div>
          </div>
          <div class="info-pill">
            <div class="label">💶 Prix</div>
            <div class="value"><?php echo $prix ? esc_html($prix) : 'Sur devis'; ?></div>
          </div>

          <?php if ($lieu) : ?>
            <div class="info-pill">
              <div class="label">📍 Lieu</div>
              <div class="value"><?php echo esc_html($lieu); ?></div>
            </div>
          <?php endif; ?>
        </div>

        <div class="detail-actions">
          <a href="#reserver" class="btn btn-primary">Réserver ce coaching →</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ DETAIL BODY ============ -->
<section class="detail-body">
  <div class="container">
    <div class="detail-layout">
      <div class="detail-main">
        <h2>À propos de ce coaching</h2>
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
