# League of Legends Web Application

Een Laravel-gebaseerde webapplicatie om discussies, nieuws en meer te beheren over League of Legends.

## Installatie-instructies

Volg deze stappen om het project lokaal te laten werken:

### 1. Vereisten

Zorg ervoor dat je de volgende tools geïnstalleerd hebt:
- PHP 8.1 of hoger
- Composer
- Node.js en npm
- MySQL
- Laravel CLI

### 2. Project downloaden

Clone de repository naar je lokale machine:

```bash
git clone [je-repository-url]
```

Ga naar de projectmap:

```bash
cd [projectnaam]
```

### 3. Dependencies installeren

Installeer PHP-dependencies via Composer:

```bash
composer install
```

Installeer frontend-dependencies met npm:

```bash
npm install
npm run dev
```

### 4. .env bestand configureren

Maak een `.env` bestand aan in de hoofdmap door `.env.example` te kopiëren:

```bash
cp .env.example .env
```

Pas de volgende waarden aan in je `.env` bestand:

```env
APP_NAME="League of Legends Web App"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=backend
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=2605a853065fbf
MAIL_PASSWORD=5d572a8532b7a1
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=lolsupport@riot.be
MAIL_FROM_NAME="LoL"
```

### 5. Database instellen

Maak de database aan in MySQL en voer de migraties uit:

```bash
php artisan migrate
```

Als je seeders hebt:

```bash
php artisan db:seed
```

### 6. App starten

Start de ontwikkelserver:

```bash
php artisan serve
```

Open je browser en ga naar [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Projectstructuur

Hier is een overzicht van de belangrijkste functionaliteiten:
- **Nieuws:** CRUD-functionaliteit voor nieuwsitems (alleen voor admins).
- **Discussies:** Gebruikers kunnen discussies starten en op elkaar reageren.
- **Profielbeheer:** Gebruikers kunnen hun profielinformatie bijwerken, inclusief profielfoto.
- **Zoeken:** Zoekfunctionaliteit voor discussies.
- **Middleware:** Rollenbeheer voor admins en gebruikers.
- **Views:** Bevat mappen zoals `auth`, `components`, `contact`, `discussions`, `emails`, `faq`, `layouts`, `news`, `profile`, `profiles`, en `users`.
- **Routes:** Beheer en configuratie van alle routes via `web.php`.
- **E-mails:** Contactformulieren worden verzonden via Mailtrap.

---

## Bronvermeldingen

- [Laravel Framework](https://laravel.com/docs)
- [TailwindCSS](https://tailwindcss.com/docs)
- [Laravel Breeze](https://github.com/laravel/breeze) voor authenticatie.
- [Unsplash](https://unsplash.com/) voor afbeeldingen.
- Icons gebruikt van [Heroicons](https://heroicons.com/).
- [YouTube: Laravel 9 CRUD met File Upload Tutorial](https://www.youtube.com/watch?v=Ngxb3W6EB5o)
- [YouTube: Laravel Authorization - Admin & Roles](https://www.youtube.com/watch?v=n6w6cJhECEQ&t=1s)
- [Mailtrap](https://mailtrap.io) voor het testen van e-mails.
- **ChatGPT**: Gebruikt voor hulp en begeleiding bij het schrijven van code en oplossen van problemen. Let op: ik kan de chats niet delen omdat er met afbeeldingen is gewerkt.

---

## Belangrijke informatie

- **Beveiliging:** Zorg ervoor dat je productieomgeving gebruikmaakt van HTTPS en andere beveiligingsmaatregelen.
- **Afbeeldingen uploaden:** Afbeeldingen worden opgeslagen in `storage/app/public`. Vergeet niet de `storage:link` uit te voeren:

```bash
php artisan storage:link
```

- **Seeders:** Als je demo-gegevens hebt toegevoegd, kun je deze initialiseren door de volgende commando's uit te voeren:

```bash
php artisan migrate --seed
```
