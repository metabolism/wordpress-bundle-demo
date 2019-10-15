# Wordpress Bundle for Symfony demo

## Introduction

This is an implementation of the Twenty Nineteen Wordpress theme for wordpress-bundle.

The "theme" concept has been removed on Wordpress Bundle, templates are now twig files located in /templates
Sass and js files are compiled using Symfony Encore, source are in /assets, compiled files in /build

## Installation

#### 1 - Clone the project

```
git clone https://github.com/wearemetabolism/wordpress-bundle-demo.git my_site
```

#### 2 - Install vendors

```
composer install && npm install && npm run build
```

#### 3 - Edit .env or create .env.local

```
###> metabolism/wordpress-bundle ###
DATABASE_URL=mysql://user:pwd@host:3306/dbname
TABLE_PREFIX=wp_
###< metabolism/wordpress-bundle ###
```

#### 4 - Install Wordpress

```
symfony server:start -d && symfony open:local
```

#### 5 - Clear cache

```
./bin/console cache:clear
```

