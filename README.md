# _BlizzCMS Olympus_

## Requirements

#### PHP

- **7.1 or newer** is recommended (Version 8.x is currently supported.)

#### Apache Modules

- [mod_headers](https://httpd.apache.org/docs/2.4/mod/mod_headers.html)
- [mod_rewrite](https://httpd.apache.org/docs/2.4/mod/mod_rewrite.html)
- [mod_expires](https://httpd.apache.org/docs/2.4/mod/mod_expires.html)

#### PHP Extensions

- [curl](https://www.php.net/manual/en/book.curl.php)
- [gd](https://www.php.net/manual/en/book.image.php)
- [mbstring](https://www.php.net/manual/en/mbstring.installation.php)
- [mysqli](https://www.php.net/manual/en/book.mysqli.php)
- [openssl](https://www.php.net/manual/en/book.openssl.php)
- [soap](https://www.php.net/manual/en/class.soapclient.php)
- [gmp](https://www.php.net/manual/en/book.gmp.php)

## Some configurations

#### In linux (Apache Modules)

You can use the following command to enable the apache extensions mentioned above.

```sh
a2enmod headers
a2enmod rewrite
a2enmod expires
```

#### Edit Sites Available

/etc/apache2/sites-available/000-default.conf

For the mod_rewrite to work correctly and generate friendly URLs, it is necessary to have permissions on the directory where the CMS is located, commonly, located in `/var/www/html`.

```
<Directory "/var/www/html">
    AllowOverride All
</Directory>
```

#### Restarting the service

```sh
/etc/init.d/apache2 restart
```

### Docker Alternative
```sh
git clone https://github.com/WoW-CMS/BlizzCMS.git
cd BlizzCMS
docker-compose build
docker-compose up -d
```

## Active Developers

* [Darthar - Back/Front-End Developer](https://github.com/perioner)
* [DZywolf - Back/Front-End Developer](https://github.com/DZywolf)

## Inactive Developers
* @vipo - *Back-End Developer*

## Copyright

Copyright © 2017+ [WoW-CMS](https://wow-cms.com).
