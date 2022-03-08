# Wordpress Bundle for Symfony demo

## Introduction

This is an implementation of the "Twenty Nineteen" Wordpress theme for wordpress-bundle.

The "theme" concept has been removed on Wordpress Bundle, templates are now twig files located in `/templates`

Sass and js files are compiled using Symfony Encore, source are located in `/assets`, compiled files in `/public/build`

## Documentation

Full bundle documentation is available on [Gitbook](https://metabolism.gitbook.io/symfony-wordpress-bundle/)

[![Doc - Gitbook](https://img.shields.io/badge/Doc-Gitbook-346ddb?style=for-the-badge&logo=gitbook&logoColor=fff)](https://metabolism.gitbook.io/symfony-wordpress-bundle/)


## Installation

#### Clone the repo

```shell
$ git clone https://github.com/wearemetabolism/wordpress-bundle-demo.git my_site
```

#### Install vendors

```shell
$ composer install && npm install
```

#### Build assets

```shell
$ npm run build
```

#### Copy .env.local sample

```shell
$ cp .env.local.sample .env.local
```

#### Create empty database

```sql
CREATE DATABASE dbname;
```

#### Update .env.local

```shell
$ nano .env.local
```

#### Start server

```shell
$ symfony serve
```

#### Install Wordpress

Navigate to https://127.0.0.1:8000 and follow the installation procedure

#### Update .env.local

```dotenv
WP_INSTALLED=1
```

#### Clear cache

```shell
$ php bin/console cache:clear
```

## Troubleshooting

### Frontpage display Symfony welcome screen

Please visit Wordpress [permalink settings page](https://127.0.0.1:8000/edition/wp-admin/options-permalink.php) and save to flush rewrite cache