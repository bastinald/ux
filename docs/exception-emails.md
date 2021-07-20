[Documentation](index.md) > Exception Emails

# Exception Emails

This package is able to email you exceptions which occur in production environments.

- [Configuring Emails](#configuring-emails)

## Configuring Emails

Set the emails in the `ux.php` config file:

```php
'exception_emails' => 'admin@example.com',
```

Or, set multiple emails:

```php
'exception_emails' => ['admin1@example.com', 'admin2@example.com'],
```

Just make sure you configured `.env` MAIL variables so these emails can send.
