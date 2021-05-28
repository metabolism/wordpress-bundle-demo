# Wordpress Bundle for Symfony demo

## Introduction

This is an implementation of the Twenty Nineteen Wordpress theme for wordpress-bundle.

The "theme" concept has been removed on Wordpress Bundle, templates are now twig files located in /templates
Sass and js files are compiled using Symfony Encore, source are in /assets, compiled files in /build

## Installation

#### 1 - Clone the repo

```shell
$ git clone https://github.com/wearemetabolism/wordpress-bundle-demo.git my_site
```

#### 2 - Install vendors

```shell
$ composer install && npm install
```

#### 3 - Build assets

```shell
$ npm run build
```

#### 4 - Create .env.local

```dotenv
###> metabolism/wordpress-bundle ###
DATABASE_URL=mysql://user:pwd@localhost:3306/dbname
TABLE_PREFIX=wp_

## use https://roots.io/salts.html to generate salts
AUTH_KEY=xxxxxx
SECURE_AUTH_KEY=xxxxxx
LOGGED_IN_KEY=xxxxxx
NONCE_KEY=xxxxxx
AUTH_SALT=xxxxxx
SECURE_AUTH_SALT=xxxxxx
LOGGED_IN_SALT=xxxxxx
NONCE_SALT=xxxxxx
###< metabolism/wordpress-bundle ###
```

#### 5 - Create empty database

```sql
CREATE DATABASE dbname;
```

#### 6 - Start server and install Wordpress

```
symfony serve
```

#### 7 - Update .env.local

```dotenv
WP_INSTALLED=1
```

## Troubleshooting

### Frontpage display Symfony welcome screen

Please visit Wordpress permalink settings page tu flush rewrite cache