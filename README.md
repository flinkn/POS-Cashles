# POS-Cashles

A PHP-based point-of-sale and inventory management system for sales, stock, users, activity, and reporting.

## Features

- Dashboard and sales/activity summaries
- Item and inventory management
- Sales checkout and sales history
- User authorization and activity tracking
- Stock, sales, and item reports

## Requirements

- PHP 8.1 or newer
- Apache with `mod_rewrite` enabled
- MySQL or MariaDB
- HTTPS is strongly recommended

## Installation

1. Clone the repository into an Apache document root or virtual-host directory.
2. Copy the project files to a directory where PHP can serve them.
3. Configure the database connection used by `controller/` and views.
4. Enable URL rewriting:
   ```bash
   sudo a2enmod rewrite
   ```
5. Restart Apache and open the configured application URL.

## Security checklist

- Never commit database credentials or production secrets.
- Enable HTTPS and set secure, HTTP-only session cookies.
- Use prepared statements for every database query.
- Hash passwords with `password_hash()` and verify with `password_verify()`.
- Apply CSRF tokens to login and state-changing actions.
- Restrict every inventory, sales, report, and user endpoint to server-side authorization.
- Keep PHP and server packages updated.

## Development notes

The repository uses Apache rewrite rules and controllers in `controller/actions/`. The UI entry point is `index.php`. Run PHP syntax checks before submitting changes:

```bash
find . -name '*.php' -print0 | xargs -0 -n1 php -l
```

## License

Apache License 2.0. See [LICENSE](LICENSE).
