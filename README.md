# Tasks for Today

A CodeIgniter 4 task management system for the IT0049 Technical Summative Assessment.

## Required pages

- `/` shows only tasks scheduled for today's date.
- `/tasks` shows every task ordered by date.
- `/profile` shows the single demo user.
- `/about` identifies the developer.

## Local setup

Requirements: PHP 8.2+ with `intl`, `mbstring`, and `mysqli`, Composer, and MySQL/MariaDB.

1. Run `composer install`.
2. Copy `.env.example` to `.env` and set the local database values.
3. Import `database/basic_pos.sql`.
4. Run `php spark serve` and open `http://localhost:8080`.

For Aiven, import `database/aiven.sql` into the selected existing database and configure the database variables in Render. Do not commit `.env`, `ca.pem`, or database passwords.

Repository: https://github.com/koFee2k5/it0049---Luna
