-- =====================================================================
-- SEED CoachUp — données de démo
-- Crée 4 catégories, 6 articles, 3 pages
-- BDD: coachup_bdd  |  Préfixe: wp_  |  Auteur: ID 1 (admin)
-- =====================================================================
-- À exécuter via phpMyAdmin (onglet SQL) ou en ligne de commande.
-- Pour repartir de zéro : décommente le bloc "RESET" tout en bas.
-- =====================================================================

USE coachup;

START TRANSACTION;

-- ---------------------------------------------------------------------
-- 1) CATÉGORIES D'ARTICLES (taxonomy = 'category')
-- ---------------------------------------------------------------------

INSERT INTO wp_terms (term_id, name, slug, term_group) VALUES
  (100, 'Leadership',   'leadership',   0),
  (101, 'Mindset',      'mindset',      0),
  (102, 'Productivité', 'productivite', 0),
  (103, 'Bien-être',    'bien-etre',    0);

INSERT INTO wp_term_taxonomy (term_taxonomy_id, term_id, taxonomy, description, parent, count) VALUES
  (100, 100, 'category', 'Articles sur le leadership et le management.',   0, 2),
  (101, 101, 'category', 'Articles sur le mindset et l\'état d\'esprit.',   0, 1),
  (102, 102, 'category', 'Articles sur la productivité et l\'organisation.', 0, 1),
  (103, 103, 'category', 'Articles sur le bien-être et la gestion du stress.', 0, 2);

-- ---------------------------------------------------------------------
-- 2) ARTICLES (post_type = 'post')
-- ---------------------------------------------------------------------

INSERT INTO wp_posts
  (ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,
   post_status, comment_status, ping_status, post_password, post_name,
   to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered,
   post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES

-- Article 1 — Leadership
(1001, 1, '2026-05-18 10:00:00', '2026-05-18 08:00:00',
'<h2>Introduction</h2>
<p>Diriger une équipe ne s\'improvise pas. Voici les 7 habitudes que nous observons chez les meilleurs leaders que nous accompagnons.</p>
<h2>1. Clarifier la vision</h2>
<p>Un bon leader rappelle le cap à chaque occasion. Pas en récitant un slogan, mais en reliant chaque décision à une direction claire.</p>
<h2>2. Écouter vraiment</h2>
<p>L\'écoute active est une discipline : reformuler, questionner, suspendre son jugement.</p>
<blockquote>Une équipe ne suit pas un titre, elle suit une direction crédible portée par une personne crédible.</blockquote>
<h2>3. Donner du feedback qui construit</h2>
<p>Le feedback est l\'oxygène de la performance. Sois précis, factuel et orienté action.</p>',
'Les 7 habitudes des leaders qui inspirent leurs équipes',
'Les rituels concrets utilisés par les meilleurs leaders pour transformer une simple équipe en collectif engagé.',
'publish', 'open', 'open', '', 'leaders-qui-inspirent',
'', '', '2026-05-18 10:00:00', '2026-05-18 08:00:00', '',
0, 'http://localhost/coachup/?p=1001', 0, 'post', '', 0),

-- Article 2 — Mindset
(1002, 1, '2026-05-15 09:30:00', '2026-05-15 07:30:00',
'<h2>Le syndrome de l\'imposteur, c\'est quoi ?</h2>
<p>Cette petite voix qui te répète que tu n\'es pas légitime, que tu as eu de la chance, qu\'on va finir par découvrir le pot aux roses.</p>
<h2>3 techniques qui fonctionnent</h2>
<h3>1. Le journal des preuves</h3>
<p>Note chaque semaine 3 réussites concrètes. C\'est ton antidote rationnel à la voix critique.</p>
<h3>2. Le recadrage cognitif</h3>
<p>Remplace « je ne suis pas légitime » par « je suis en train d\'apprendre ».</p>
<h3>3. L\'action avant la confiance</h3>
<p>La confiance vient après l\'action, pas avant. Lance-toi imparfaitement.</p>',
'Comment surmonter le syndrome de l\'imposteur',
'3 techniques concrètes pour reprendre confiance et oser passer à l\'action, même quand la petite voix te freine.',
'publish', 'open', 'open', '', 'syndrome-imposteur',
'', '', '2026-05-15 09:30:00', '2026-05-15 07:30:00', '',
0, 'http://localhost/coachup/?p=1002', 0, 'post', '', 0),

-- Article 3 — Productivité
(1003, 1, '2026-05-10 14:00:00', '2026-05-10 12:00:00',
'<h2>Pourquoi 3 et pas 10 ?</h2>
<p>Parce qu\'au-delà de 3 priorités, ce ne sont plus des priorités. C\'est une liste de choses à faire.</p>
<h2>Le rituel du matin (5 min)</h2>
<p>Chaque matin, écris les 3 choses qui, si elles sont faites, te feront dire « j\'ai eu une bonne journée ».</p>
<h2>La règle du non-négociable</h2>
<p>Bloque le créneau dans ton agenda. Si quelqu\'un veut te voir à ce moment, tu réponds « j\'ai déjà un rendez-vous ».</p>',
'La méthode des 3 priorités pour des journées efficaces',
'Une routine simple pour cesser de t\'éparpiller et avancer vraiment sur ce qui compte.',
'publish', 'open', 'open', '', 'methode-3-priorites',
'', '', '2026-05-10 14:00:00', '2026-05-10 12:00:00', '',
0, 'http://localhost/coachup/?p=1003', 0, 'post', '', 0),

-- Article 4 — Bien-être
(1004, 1, '2026-05-05 11:00:00', '2026-05-05 09:00:00',
'<h2>La respiration 4-7-8</h2>
<p>Une technique de respiration qui calme le système nerveux en moins d\'une minute.</p>
<h2>Comment faire</h2>
<ul>
<li>Inspire par le nez pendant 4 secondes</li>
<li>Retiens ton souffle pendant 7 secondes</li>
<li>Expire par la bouche pendant 8 secondes</li>
</ul>
<p>Répète 4 fois. Pratique chaque soir avant de dormir pour t\'entraîner.</p>',
'Gérer le stress : la respiration 4-7-8 expliquée',
'Un exercice à pratiquer partout pour retrouver son calme en 1 minute chrono.',
'publish', 'open', 'open', '', 'respiration-4-7-8',
'', '', '2026-05-05 11:00:00', '2026-05-05 09:00:00', '',
0, 'http://localhost/coachup/?p=1004', 0, 'post', '', 0),

-- Article 5 — Leadership
(1005, 1, '2026-04-28 16:00:00', '2026-04-28 14:00:00',
'<h2>Le modèle SBI</h2>
<p>SBI = Situation, Behavior, Impact. Une grille simple pour donner du feedback factuel et utile.</p>
<h2>La structure</h2>
<p><strong>Situation</strong> : contexte précis (lieu, moment).<br>
<strong>Behavior</strong> : ce que tu as observé, factuellement.<br>
<strong>Impact</strong> : l\'effet que ça a eu sur toi, l\'équipe, le projet.</p>
<h2>Exemple concret</h2>
<blockquote>« En réunion mardi (S), tu as interrompu Camille trois fois (B). Ça l\'a empêchée de finir son idée et j\'ai eu l\'impression qu\'elle s\'est repliée pour le reste de la réunion (I). »</blockquote>',
'Donner un feedback qui transforme (sans démotiver)',
'Le modèle SBI que nous enseignons aux managers depuis 10 ans pour des feedbacks utiles et bien reçus.',
'publish', 'open', 'open', '', 'feedback-sbi',
'', '', '2026-04-28 16:00:00', '2026-04-28 14:00:00', '',
0, 'http://localhost/coachup/?p=1005', 0, 'post', '', 0),

-- Article 6 — Bien-être
(1006, 1, '2026-04-20 10:30:00', '2026-04-20 08:30:00',
'<h2>La cohérence cardiaque</h2>
<p>Une pratique scientifiquement validée pour réguler le système nerveux et améliorer la concentration.</p>
<h2>La méthode 3-6-5</h2>
<ul>
<li><strong>3</strong> fois par jour</li>
<li><strong>6</strong> respirations par minute (5s d\'inspiration, 5s d\'expiration)</li>
<li><strong>5</strong> minutes par session</li>
</ul>
<p>Effets mesurables après 2 semaines : moins de stress, meilleur sommeil, plus de clarté mentale.</p>',
'Cohérence cardiaque : la méthode 3-6-5',
'Une pratique de 5 minutes, 3 fois par jour, pour réguler ton système nerveux et retrouver de l\'énergie.',
'publish', 'open', 'open', '', 'coherence-cardiaque',
'', '', '2026-04-20 10:30:00', '2026-04-20 08:30:00', '',
0, 'http://localhost/coachup/?p=1006', 0, 'post', '', 0);

-- ---------------------------------------------------------------------
-- 3) RELATIONS ARTICLES ↔ CATÉGORIES
-- ---------------------------------------------------------------------

INSERT INTO wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES
  (1001, 100, 0),  -- Leaders inspirants     → Leadership
  (1002, 101, 0),  -- Syndrome imposteur     → Mindset
  (1003, 102, 0),  -- 3 priorités            → Productivité
  (1004, 103, 0),  -- Respiration 4-7-8      → Bien-être
  (1005, 100, 0),  -- Feedback SBI           → Leadership
  (1006, 103, 0);  -- Cohérence cardiaque    → Bien-être

-- ---------------------------------------------------------------------
-- 4) PAGES (post_type = 'page')
-- ---------------------------------------------------------------------

INSERT INTO wp_posts
  (ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,
   post_status, comment_status, ping_status, post_password, post_name,
   to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered,
   post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES

-- Page : À propos
(1007, 1, '2026-01-01 09:00:00', '2026-01-01 08:00:00',
'<p>CoachUp est née en 2020 d\'une conviction simple : un bon coach peut changer une trajectoire de vie. Notre mission est de rendre cet accompagnement accessible à tous.</p>
<h2>Notre histoire</h2>
<p>3 coachs, une conviction, un site WordPress monté un week-end. 6 ans plus tard, plus de 250 coachs travaillent avec nous et 12 000 sessions ont été réalisées.</p>
<h2>Nos valeurs</h2>
<ul>
<li>La qualité avant la quantité</li>
<li>L\'humain au centre</li>
<li>Des résultats mesurables</li>
</ul>',
'À propos',
'CoachUp est née d\'une conviction simple : un bon coach peut changer une trajectoire de vie.',
'publish', 'closed', 'closed', '', 'a-propos',
'', '', '2026-01-01 09:00:00', '2026-01-01 08:00:00', '',
0, 'http://localhost/coachup/?page_id=1007', 0, 'page', '', 0),

-- Page : Contact
(1008, 1, '2026-01-01 09:00:00', '2026-01-01 08:00:00',
'<h2>Contacte-nous</h2>
<p>Une question, un projet ? On te répond sous 24h ouvrées.</p>
<ul>
<li><strong>Email</strong> : hello@coachup.fr</li>
<li><strong>Téléphone</strong> : 01 23 45 67 89</li>
<li><strong>Adresse</strong> : 12 rue de la République, 75001 Paris</li>
</ul>
<h2>Horaires</h2>
<p>Lundi au vendredi, 9h - 18h.</p>',
'Contact',
'Une question, un projet ? Notre équipe te répond sous 24h ouvrées.',
'publish', 'closed', 'closed', '', 'contact',
'', '', '2026-01-01 09:00:00', '2026-01-01 08:00:00', '',
0, 'http://localhost/coachup/?page_id=1008', 0, 'page', '', 0),

-- Page : Mentions légales
(1009, 1, '2026-01-01 09:00:00', '2026-01-01 08:00:00',
'<h2>Éditeur du site</h2>
<p>CoachUp SAS, 12 rue de la République, 75001 Paris. RCS Paris 123 456 789.</p>
<h2>Hébergement</h2>
<p>Site hébergé par OVH SAS, 2 rue Kellermann, 59100 Roubaix.</p>
<h2>Données personnelles</h2>
<p>Conformément au RGPD, tu disposes d\'un droit d\'accès, de rectification et de suppression de tes données. Pour exercer ce droit : privacy@coachup.fr.</p>',
'Mentions légales',
'Mentions légales et informations RGPD du site CoachUp.',
'publish', 'closed', 'closed', '', 'mentions-legales',
'', '', '2026-01-01 09:00:00', '2026-01-01 08:00:00', '',
0, 'http://localhost/coachup/?page_id=1009', 0, 'page', '', 0);

COMMIT;

-- =====================================================================
-- BONUS — Désigner la page « Blog » et la page « Accueil »
-- (à exécuter séparément, après création des pages voulues)
-- =====================================================================
-- UPDATE wp_options SET option_value = 'page' WHERE option_name = 'show_on_front';
-- UPDATE wp_options SET option_value = '1007' WHERE option_name = 'page_on_front';  -- ID page d'accueil
-- UPDATE wp_options SET option_value = '1008' WHERE option_name = 'page_for_posts'; -- ID page blog

-- =====================================================================
-- RESET — pour tout supprimer et ré-exécuter le seed
-- =====================================================================
-- DELETE FROM wp_term_relationships WHERE object_id BETWEEN 1001 AND 1009;
-- DELETE FROM wp_postmeta WHERE post_id BETWEEN 1001 AND 1009;
-- DELETE FROM wp_posts WHERE ID BETWEEN 1001 AND 1009;
-- DELETE FROM wp_term_taxonomy WHERE term_taxonomy_id BETWEEN 100 AND 103;
-- DELETE FROM wp_terms WHERE term_id BETWEEN 100 AND 103;
