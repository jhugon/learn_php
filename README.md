# learn_php

PHP is useful in 2025 because it is the only thing shared web hosting providers support well (for WordPress!).

## Useful Snippets

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
