<?php
/**
 * Template Name: Page Réservation (design CoachUp)
 *
 * À assigner sur la page "Réservation" via :
 * Pages → Modifier → Attributs de la page → Modèle → "Page Réservation (design CoachUp)"
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- ============ HERO ============ -->
<section class="page-hero">
  <div class="container">
    <span class="eyebrow">Réservation</span>
    <h1>Réserve ta première séance.</h1>
    <p>1ère séance offerte, sans engagement. Réponse sous 24h ouvrées.</p>
  </div>
</section>

<!-- ============ COMMENT ÇA MARCHE ============ -->
<section>
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">3 étapes simples</span>
      <h2>Comment ça marche.</h2>
    </div>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon">📝</div>
        <h3>1. Tu réserves</h3>
        <p>Choisis ton coaching, ta date et envoie ta demande en 2 minutes.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">📞</div>
        <h3>2. On confirme</h3>
        <p>Notre équipe te recontacte sous 24h pour caler le créneau parfait.</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">🚀</div>
        <h3>3. On démarre</h3>
        <p>Première séance offerte pour faire connaissance et définir tes objectifs.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============ FORMULAIRE ============ -->
<section style="background: var(--gray-50);">
  <div class="container" style="max-width: 720px;">
    <div class="section-head">
      <span class="eyebrow">Formulaire</span>
      <h2>Réserve maintenant.</h2>
      <p>Remplis le formulaire ci-dessous, on s'occupe du reste.</p>
    </div>

    <div class="reservation-wrapper">
      <?php echo do_shortcode('[contact-form-7 id="cdbb142" title="Réservation coaching"]'); ?>
    </div>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section>
  <div class="container" style="max-width: 720px;">
    <div class="section-head">
      <span class="eyebrow">FAQ</span>
      <h2>Questions fréquentes.</h2>
    </div>
    <div class="faq">
      <details>
        <summary>Puis-je annuler ou décaler une séance ?</summary>
        <p>Oui, jusqu'à 24h avant. Au-delà, la séance est dûe pour respecter le coach.</p>
      </details>
      <details>
        <summary>En visio ou en présentiel ?</summary>
        <p>Les deux sont possibles selon le coaching choisi. Tu peux le préciser dans le message.</p>
      </details>
      <details>
        <summary>Quels sont les moyens de paiement ?</summary>
        <p>CB, virement bancaire, ou paiement en 3 fois sans frais pour les programmes &gt; 300€.</p>
      </details>
      <details>
        <summary>La première séance est-elle vraiment offerte ?</summary>
        <p>Oui, 30 minutes pour faire connaissance, sans engagement et sans carte requise.</p>
      </details>
    </div>
  </div>
</section>

<!-- ============ CONTACT DIRECT ============ -->
<section>
  <div class="container">
    <div class="cta-strip">
      <div class="inner">
        <div>
          <span class="eyebrow" style="color: var(--accent);">Pas sûr de ton choix ?</span>
          <h2>Appelle-nous directement.</h2>
          <p>Notre équipe est là pour t'aider à trouver le bon coaching.</p>
        </div>
        <a href="tel:+33123456789" class="btn btn-accent">📞 01 23 45 67 89</a>
      </div>
    </div>
  </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
