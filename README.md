# Rebirth UO

The official website for **Rebirth**, an Ultima Online free shard with Felucca rules and insurance.

Players can download the game installer, donate for in-game Sovereigns, and share gameplay videos with the community.

## Tech Stack

- **PHP 8.5** / **Laravel 13**
- **Livewire 4** (native single-file components — no Volt)
- **Tailwind CSS 4** (via Vite)
- **PostgreSQL 18** (via Laravel Herd)
- **Stripe** for donation payments
- **Pest 4** for testing

## Architecture

All pages follow a strict **Livewire SFC → Controller → Service** pattern. No business logic in Volt/Livewire components.

```
resources/views/pages/donate/index.blade.php  (Livewire SFC — UI + state only)
        ↓
app/Http/Controllers/DonationController.php   (Thin controller — delegates to service)
        ↓
app/Services/DonationService.php              (Business logic)
        ↓
app/Services/PaymentGateways/StripePaymentGateway.php  (External integrations)
```

The same pattern applies to videos (`VideoController` → `VideoService`).

## Setup

### Requirements

- [Laravel Herd](https://herd.laravel.com/) for Windows (PHP 8.5, PostgreSQL service)
- Node 20+
- Stripe test account

### First-time setup

```bash
# Install PHP and JS dependencies
composer install
npm install

# Copy env and generate app key
cp .env.example .env
php artisan key:generate

# Create the PostgreSQL database (Herd's psql)
PGPASSWORD=your_password psql -U postgres -h 127.0.0.1 -c "CREATE DATABASE rebirth;"

# Run migrations
php artisan migrate

# Build assets
npm run dev
```

### Environment

Set these in `.env`:

```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=rebirth
DB_USERNAME=postgres
DB_PASSWORD=your_password

SESSION_DRIVER=cookie

STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...   # from `stripe listen` for local dev
```

### Local site

The site runs at **https://rebirth.test** via Herd's automatic site detection.

## Routes

| Path | Description |
|------|-------------|
| `/` | Home — hero, features, donation CTA |
| `/donate` | Stripe checkout for Sovereigns ($10 = 1,000 Sovereigns) |
| `/videos` | Community-submitted gameplay videos (PvP, PvM, Event) |
| `/stripe/webhook` | Stripe payment confirmation webhook |

## Stripe Webhook (Local Development)

Donations are only recorded after the Stripe webhook fires. For local testing:

```bash
stripe listen --forward-to https://rebirth.test/stripe/webhook
```

Copy the `whsec_...` it prints into `STRIPE_WEBHOOK_SECRET` in `.env`.

## Game Installer

The Windows installer (`RebirthInstaller.zip`, ~1.7 GB) is **not** in this repo — it lives in [GitHub Releases](https://github.com/deshazer72/rebirthuo/releases). The download link in the footer points there.

For local dev, drop a copy into `public/downloads/RebirthInstaller.zip` (gitignored).

## Testing

```bash
composer test       # lint + run Pest tests
composer lint       # auto-fix code style with Pint
```

## Hosting & Deployment

- **Domain:** **rebirthuo.com** (registered with GoDaddy, DNS points to Laravel Cloud)
- **App hosting:** [Laravel Cloud](https://cloud.laravel.com/) — managed Laravel platform with auto-deploys from this repo
- **Payments:** [Stripe](https://dashboard.stripe.com/) — handles all donation checkout, payment processing, and webhooks
- **Database:** PostgreSQL provisioned via Laravel Cloud
- **Stripe webhook:** Configured in the Stripe dashboard pointing to `https://rebirthuo.com/stripe/webhook`

### Deployment Notes

- No user accounts — donations are tied to in-game account name only
- Sessions use cookie driver (no DB sessions table)
- Tables: `donations`, `videos`, `cache`, `jobs`
- Stripe webhook must be reachable from the public internet in production (handled automatically by Laravel Cloud)
