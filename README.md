# learn_php

PHP is useful in 2025 because it is the only thing shared web hosting providers support well (for WordPress!).



## Security

[PHP manual section on security](https://www.php.net/manual/en/security.php)

The Flask documentation has a nice [security checklist.](https://flask.palletsprojects.com/en/stable/web-security/#security-csp)

From https://en.m.wikipedia.org/wiki/Session_fixation

```php
if (isset($_GET['LOGOUT']) ||
    $_SERVER['REMOTE_ADDR'] !== $_SESSION['PREV_REMOTEADDR'] ||
    $_SERVER['HTTP_USER_AGENT'] !== $_SESSION['PREV_USERAGENT']) {
    session_destroy();
}

session_regenerate_id(); // Generate a new session identifier

$_SESSION['PREV_USERAGENT'] = $_SERVER['HTTP_USER_AGENT'];
$_SESSION['PREV_REMOTEADDR'] = $_SERVER['REMOTE_ADDR'];
```

## Cheat sheet

- [`var_dump`](https://www.php.net/manual/en/function.var-dump.php): dump a variable to standard output
