CREATE DATABASE IF NOT EXISTS `fpd_cms`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `fpd_cms`;

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(120) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_admin_users_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `news_posts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `excerpt` TEXT NULL,
  `content` LONGTEXT NOT NULL,
  `image_path` VARCHAR(255) NULL,
  `category` ENUM('communique', 'terrain', 'formation', 'mobilisation') NOT NULL DEFAULT 'communique',
  `status` ENUM('draft', 'published') NOT NULL DEFAULT 'draft',
  `published_at` DATETIME NOT NULL,
  `author_name` VARCHAR(120) NOT NULL DEFAULT 'FPD',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_news_posts_slug` (`slug`),
  KEY `idx_news_posts_status_published` (`status`, `published_at`),
  KEY `idx_news_posts_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admin_users` (`username`, `password_hash`, `full_name`)
VALUES ('admin', '$2y$10$Is6ZVd3z2eoSu300EdWZku/lUpRaDO8bqyQDI95zI9/TTTnTXuTRy', 'Administrateur FPD')
ON DUPLICATE KEY UPDATE `full_name` = VALUES(`full_name`);

INSERT INTO `news_posts`
(`title`, `slug`, `excerpt`, `content`, `image_path`, `category`, `status`, `published_at`, `author_name`)
VALUES
(
  'Lancement de la tournee citoyenne nationale',
  'tournee-citoyenne-nationale',
  'Rencontres regionales pour construire des solutions de proximite.',
  'Le FPD deploie une tournee citoyenne nationale afin de renforcer l ecoute des populations et d integrer leurs priorites dans les politiques publiques.',
  'autorite.jpeg',
  'terrain',
  'published',
  NOW(),
  'Direction Communication'
),
(
  'Session de formation des jeunes cadres',
  'formation-jeunes-cadres',
  'Preparation de la releve politique et administrative.',
  'Une nouvelle session de l academie politique FPD est ouverte pour renforcer les capacites en leadership, gouvernance et communication publique.',
  'secretaire-generale.jpg',
  'formation',
  'published',
  DATE_SUB(NOW(), INTERVAL 2 DAY),
  'Direction Formation'
),
(
  'Communique sur la cohesion nationale',
  'communique-cohesion-nationale',
  'Le parti appelle a un dialogue responsable.',
  'Le FPD appelle a un cadre de dialogue constructif pour consolider la cohesion nationale et accelerer les reformes utiles aux citoyens.',
  'lgo_desing.png',
  'communique',
  'published',
  DATE_SUB(NOW(), INTERVAL 4 DAY),
  'Secretariat General'
)
ON DUPLICATE KEY UPDATE
  `title` = VALUES(`title`);
