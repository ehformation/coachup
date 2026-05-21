<!-- ============ CTA ============ -->
<section>
  <div class="container">
    <div class="cta-strip">
      <div class="inner">
        <div>
          <span class="eyebrow" style="color: var(--accent);">Première séance offerte</span>
          <h2>Prêt à passer à la vitesse supérieure&nbsp;?</h2>
          <p>Réserve ton appel découverte de 30 minutes, sans engagement.</p>
        </div>
        <a href="#" class="btn btn-accent">Réserver mon appel →</a>
      </div>
    </div>
  </div>
</section>

<!-- ============ FOOTER ============ -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-coachup-large-blanc.png" alt="CoachUp">
            </a>
        </div>
        <div class="hero-actions">
          <?php get_search_form(); ?>
        </div>
        <p><?php echo get_bloginfo('description'); ?></p>
        <div class="social">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container'      => false,
                'menu_class'     => 'social-menu',
              ));
            ?>
        </div>
      </div>
      <div>
        <h4>Plateforme</h4>
        <div>
          <?php if ( is_active_sidebar('footer1') ) : ?>
            <?php dynamic_sidebar('footer1'); ?>
          <?php endif; ?>
        </div>
      </div>
      <div>
        <h4>Ressources</h4>
        <div>
          <?php if ( is_active_sidebar('footer2') ) : ?>
            <?php dynamic_sidebar('footer2'); ?>
          <?php endif; ?>
        </div>
      </div>
      <div>
        <h4>Société</h4>
        <div>
          <?php if ( is_active_sidebar('footer3') ) : ?>
            <?php dynamic_sidebar('footer3'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 CoachUp — Tous droits réservés.</span>
      <span>Fait avec ❤︎ à Paris</span>
    </div>
  </div>
</footer>
  <!-- jQuery uniquement (gardé au cas où un plugin en a besoin) -->
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.min.js"></script>
  <?php wp_footer(); ?>
</body>
</html>
