# Security Policy

## Supported versions

Security fixes are applied to the latest `main` branch and the next supported release branch.

## Reporting a vulnerability

Do not open a public issue for a security vulnerability. Report it privately to the repository owner through a GitHub security advisory:

1. Open the repository Security tab.
2. Select **Advisories**.
3. Choose **Report a vulnerability**.
4. Include reproduction steps, impact, affected files, and suggested remediation.

Please allow the maintainer reasonable time to investigate and release a fix before public disclosure.

## Production security baseline

- Use HTTPS and secure, HTTP-only, same-site session cookies.
- Keep PHP and Apache packages updated.
- Use `password_hash()` and `password_verify()` for credentials.
- Use prepared statements for every SQL query.
- Require CSRF tokens for state-changing requests.
- Authorize inventory, sales, reports, and user endpoints server-side.
- Store secrets outside the repository and restrict file permissions.
- Apply rate limits to login and checkout endpoints.
- Run automated tests and dependency scans on every pull request.
