WeRedis
-------------
**WeRedis** is small PHP library to have some fun with [Redis](http://redis.io).

## Getting started

Require this package, with [Composer](https://getcomposer.org), in the root directory of your project.

```bash
$ composer require thinfer/we-redis
```

> **Note:** WeRedis requires the [PECL::Package::redis](http://pecl.php.net/package/redis) extension in order to work.

## Quick Example

```php
use Thinfer\WeRedis;

$redis = WeRedis\Factory::instance($config);
```
