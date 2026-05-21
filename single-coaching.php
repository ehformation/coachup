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

        <button type="button" class="btn btn-primary" data-open="modal-reserver">
          Réserver cette séance →
        </button>
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
<!-- ============ MODAL RÉSERVATION ============ -->
<div class="modal-overlay" id="modal-reserver" aria-hidden="true">
  <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="modal-title">

    <button type="button" class="modal-close" aria-label="Fermer">×</button>

    <div class="modal-header">
      <div class="modal-icon">🎯</div>
      <h2 id="modal-title">Réserver cette séance</h2>
      <p class="modal-subtitle"><?php the_title(); ?></p>
    </div>

    <div class="modal-body">
      <?php echo do_shortcode('[contact-form-7 id="e15a562" title="Réservation coaching"]'); ?>
    </div>

  </div>
</div>

<script>
  (function() {
    var modal = document.getElementById('modal-reserver');
    if (!modal) return;

    var openBtns  = document.querySelectorAll('[data-open="modal-reserver"]');
    var closeBtns = modal.querySelectorAll('.modal-close');
    var titre     = <?php echo wp_json_encode( get_the_title() ); ?>;

    function open()  { modal.classList.add('is-open');    document.body.style.overflow = 'hidden'; }
    function close() { modal.classList.remove('is-open'); document.body.style.overflow = ''; }

    function fillCoaching() {
      var input = modal.querySelector('input[name="coaching"]');
      if (input) input.value = titre;
    }

    // 1) Tentative au chargement initial (CF7 peut charger en différé)
    setTimeout(fillCoaching, 100);
    setTimeout(fillCoaching, 500);

    // 2) Et à chaque ouverture de la modale (sécurité)
    openBtns.forEach(function(b) {
      b.addEventListener('click', function(e) {
        e.preventDefault();
        open();
        setTimeout(fillCoaching, 50);
      });
    });

    closeBtns.forEach(function(b) { b.addEventListener('click', close); });
    modal.addEventListener('click', function(e) { if (e.target === modal) close(); });
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') close(); });
  })();
</script>

<?php endwhile; ?>

<?php get_footer(); ?>
