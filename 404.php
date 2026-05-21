<?php get_header(); ?>

<section class="error-page">
  <div>
    <div class="error-code">404</div>
    <h1>Cette page a pris des vacances.</h1>
    <p>La page que tu cherches n'existe pas (ou plus). Pas de panique, on te ramène en territoire connu&nbsp;: il y a plein de choses à découvrir.</p>

    <div class="error-actions">
      <a href="<?php echo home_url(); ?>" class="btn btn-primary">← Retour à l'accueil</a>
    </div>

    <div style="margin-top: 80px;">
      <span class="eyebrow">Pendant que tu es là</span>
      <h2 style="font-size: 1.4rem; margin-bottom: 24px;">Quelques pages populaires</h2>
      <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
        <?php if ( get_option('page_for_posts') ) : ?>
          <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="filter-chip">📚 Le blog</a>
        <?php endif; ?>
        <a href="<?php echo home_url('/'); ?>" class="filter-chip">🏠 Accueil</a>
      </div>
      <div style="margin-top: 48px; max-width: 480px; margin-left: auto; margin-right: auto;">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>