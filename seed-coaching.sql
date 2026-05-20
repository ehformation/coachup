USE coachup;

START TRANSACTION;

-- 1) LES 9 COACHINGS
INSERT INTO wp_posts
  (ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,
   post_status, comment_status, ping_status, post_password, post_name,
   to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered,
   post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES

(2001, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>Sculpte une silhouette athlétique : perte de gras tout en préservant le muscle. Idéal avant l\'été ou pour reprendre en main ton physique.</p>',
'Sèche & définition musculaire', 'Perds le gras, garde le muscle. Plan complet entraînement + nutrition sur 8 semaines.',
'publish', 'closed', 'closed', '', 'seche-definition', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2001', 0, 'coaching', '', 0),

(2002, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>Spécial powerlifting : développe ta force max sur les 3 mouvements rois (squat, bench, deadlift). Programme cycle de 10 semaines.</p>',
'Force pure (powerlifting)', 'Bats tes records personnels au squat, développé couché et soulevé de terre en 10 semaines.',
'publish', 'closed', 'closed', '', 'force-powerlifting', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2002', 0, 'coaching', '', 0),

(2003, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>Pas le temps d\'aller en salle ? Programme 100% maison, sans équipement (ou avec haltères légers). 30 min/jour, 4 fois par semaine.</p>',
'Muscu à la maison', 'Programme 6 semaines au poids du corps. Sans matériel, 30 minutes par séance.',
'publish', 'closed', 'closed', '', 'muscu-maison', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2003', 0, 'coaching', '', 0),

(2004, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>Débutant ou reprise : un plan progressif pour courir ton premier 10 km sans douleur en 10 semaines.</p>',
'Préparation 10 km', 'De zéro à ton premier 10 km en 10 semaines. Plan progressif et adapté à ton rythme.',
'publish', 'closed', 'closed', '', 'prepa-10km', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2004', 0, 'coaching', '', 0),

(2005, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>Séances explosives de 30 minutes max. Brûle un maximum de calories en un minimum de temps. Idéal pour la perte de poids.</p>',
'HIIT brûle-graisses', 'Séances HIIT de 30 min, 3 fois par semaine. Perte de poids visible en 6 semaines.',
'publish', 'closed', 'closed', '', 'hiit-brule-graisses', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2005', 0, 'coaching', '', 0),

(2006, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>L\'objectif : franchir la ligne d\'arrivée de ton premier marathon en bonne forme. Plan 16 semaines + suivi blessures et nutrition.</p>',
'Préparation marathon', 'Plan 16 semaines complet pour préparer ton premier marathon, blessures évitées.',
'publish', 'closed', 'closed', '', 'prepa-marathon', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2006', 0, 'coaching', '', 0),

(2007, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>Yoga doux pour reprendre une activité physique en douceur, soulager le dos et apaiser le mental. Séances de 45 min.</p>',
'Yoga débutant', 'Yoga doux pour débuter sereinement. 2 séances/sem, 45 min, posture du dos et apaisement.',
'publish', 'closed', 'closed', '', 'yoga-debutant', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2007', 0, 'coaching', '', 0),

(2008, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>Pilates pour renforcer ta sangle abdominale, ton dos et améliorer ta posture. Idéal pour les sédentaires.</p>',
'Pilates posture & gainage', 'Renforce ta sangle abdominale et corrige ta posture en 8 semaines de pilates.',
'publish', 'closed', 'closed', '', 'pilates-posture', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2008', 0, 'coaching', '', 0),

(2009, 1, '2026-05-01 10:00:00', '2026-05-01 08:00:00',
'<p>Mobilité, étirements profonds et techniques de récupération. Pour les sportifs qui veulent éviter les blessures.</p>',
'Mobilité & récupération', 'Gagne en souplesse, préviens les blessures et améliore ta récupération sportive.',
'publish', 'closed', 'closed', '', 'mobilite-recuperation', '', '',
'2026-05-01 10:00:00', '2026-05-01 08:00:00', '', 0,
'http://localhost/coachup/?post_type=coaching&p=2009', 0, 'coaching', '', 0);

-- 2) RELATIONS COACHINGS ↔ TYPES (slug-based, pas besoin de connaître les IDs)
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id, term_order)
SELECT v.id, tt.term_taxonomy_id, 0
FROM (
  SELECT 2001 AS id, 'musculation-force'   AS slug UNION ALL
  SELECT 2002, 'musculation-force'   UNION ALL
  SELECT 2003, 'musculation-force'   UNION ALL
  SELECT 2004, 'cardio-endurance'    UNION ALL
  SELECT 2005, 'cardio-endurance'    UNION ALL
  SELECT 2006, 'cardio-endurance'    UNION ALL
  SELECT 2007, 'bien-etre-souplesse' UNION ALL
  SELECT 2008, 'bien-etre-souplesse' UNION ALL
  SELECT 2009, 'bien-etre-souplesse'
) v
JOIN wp_terms t          ON t.slug = v.slug
JOIN wp_term_taxonomy tt ON tt.term_id = t.term_id AND tt.taxonomy = 'type-coaching';

-- 3) META : durée & prix
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES
  (2001, 'duree', '8 semaines'),  (2001, 'prix', '390€'),
  (2002, 'duree', '10 semaines'), (2002, 'prix', '690€'),
  (2003, 'duree', '6 semaines'),  (2003, 'prix', '190€'),
  (2004, 'duree', '10 semaines'), (2004, 'prix', '290€'),
  (2005, 'duree', '6 semaines'),  (2005, 'prix', '249€'),
  (2006, 'duree', '16 semaines'), (2006, 'prix', '790€'),
  (2007, 'duree', '8 semaines'),  (2007, 'prix', '199€'),
  (2008, 'duree', '8 semaines'),  (2008, 'prix', '249€'),
  (2009, 'duree', '4 semaines'),  (2009, 'prix', '149€');

-- 4) Mise à jour du compteur de chaque type
UPDATE wp_term_taxonomy SET count = (
  SELECT COUNT(*) FROM wp_term_relationships WHERE term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
) WHERE taxonomy = 'type-coaching';

COMMIT;
