## Security

Simple and Light Cookie Class for Php

[![Latest Stable Version](http://poser.pugx.org/omerfdmrl/cookie/v)](https://packagist.org/packages/omerfdmrl/cookie) 
[![Total Downloads](http://poser.pugx.org/omerfdmrl/cookie/downloads)](https://packagist.org/packages/omerfdmrl/cookie) 
[![Latest Unstable Version](http://poser.pugx.org/omerfdmrl/cookie/v/unstable)](https://packagist.org/packages/omerfdmrl/cookie) 
[![License](http://poser.pugx.org/omerfdmrl/cookie/license)](https://packagist.org/packages/omerfdmrl/cookie) 
[![PHP Version Require](http://poser.pugx.org/omerfdmrl/cookie/require/php)](https://packagist.org/packages/omerfdmrl/cookie)


### Features
- Create, Delete, Set Cookie
- Set Prefix, Domain, Secure, OnlyHttp, Path

## Install

run the following command directly.

```
$ composer require omerfdmrl/cookie
```

## Usage
```php
include 'vendor/autoload.php';

use Omerfdmrl\Cookie\Cookie;

$cookie = new Cookie;

// You can change cookie name's prefix
$cookie->set_prefix('prefix_');

// They will be work on just $_SERVER['HTTPS'];
// Default is False
$cookie->set_secure(False);

// They will be work just HTTP protocol. Sometimes they can block xss attacks. 
// Default is False
$cookie->set_onlyHttp(False);

// For use in path. If you set as '/path/path2'; Cookie will start only '/path/path2'
// Default is ''
$cookie->set_path('/path');

// If you set it like this, cookie will saved for subdomains to
// Default is ''
$cookie->set_domain('.domain.com')

// Create Cookie
// You can use: time() + 3600 etc.
// You can use: '+1 day' / '+5 week' / '+2 year' etc.
$cookie->set('my_cookie','my_value','+1 day');

// This cookie will be forever
$cookie->forever('forever_cookie','forever_value');

// They will return 'my_value'. If cookie doens't exist, They will return False
$cookie->get('my_cookie');

// You can change cookie's value
$cookie->set('my_cookie','second_value');

// Delete Cookie
$cookie->delete('my_cookie');


```


## Docs
Documentation page: [Cookie Docs][doc-url]


## Licence
[MIT Licence][mit-url]

## Contributing

1. Fork it ( https://github.com/omerfdmrl/cookie/fork )
2. Create your feature branch (git checkout -b my-new-feature)
3. Commit your changes (git commit -am 'Add some feature')
4. Push to the branch (git push origin my-new-feature)
5. Create a new Pull Request

## Contributors

- [omerfdmrl](https://github.com/omerfdmrl) Ömer Faruk Demirel - creator, maintainer

[mit-url]: http://opensource.org/licenses/MIT
[doc-url]: https://github.com/omerfdmrl/cookie/wiki
