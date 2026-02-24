# FPD CMS (PHP + MySQL)

Site FPD adapte depuis le template `fox-master` avec charte graphique politique et systeme de publication d actualites.

## Stack

- PHP 8.0+
- MySQL / MariaDB
- Front assets Fox (`css/`, `js/`, `fonts/`, `images/`)
- Routage MVC via front controller `index.php`

## Installation

1. Importer la base:
   - Ouvrir phpMyAdmin
   - Importer `sql/fpd_cms.sql`

2. Verifier la config DB dans `includes/config.php`:
   - `DB_HOST`
   - `DB_PORT`
   - `DB_NAME`
   - `DB_USER`
   - `DB_PASS`
   - `APP_BASE_PATH` (local WAMP: `/fpd`)

3. Ouvrir le site:
   - `http://localhost/fpd/`

4. Connexion admin:
   - URL: `http://localhost/fpd/admin/login.php`
   - Username: `admin`
   - Password: `admin123`

## Pages publiques

- `/`
- `/parti`
- `/actualites`
- `/article/{slug}`
- `/programme`
- `/mobilisation`
- `/contact`

## Structure MVC

- `index.php` : front controller
- `app/Controllers/PublicController.php` : controleur des pages publiques
- `app/Controllers/ErrorController.php` : gestion des erreurs (404)
- `app/Models/NewsModel.php` : couche modele (actualites)
- `home.php`, `parti.php`, `actualites.php`, `article.php`, `programme.php`, `mobilisation.php`, `contact.php` : vues publiques existantes

## Admin actualites

- `admin/index.php` liste
- `admin/edit.php` creation/modification
- `admin/delete.php` suppression

## Notes

- Les anciennes URLs `.php` et `.html` sont redirigees automatiquement vers les routes propres.
- Si la base n est pas encore configuree, les pages publiques affichent des actualites fallback.
- URL locale correcte : `http://localhost/fpd/contact` (et non `http://localhost/C:/wamp64/www/fpd/contact`).
