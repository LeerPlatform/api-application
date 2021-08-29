# API Application

> Online courses platform

## Overview

This repository contains the RESTful API of the Leer Platform.

## Installation

Clone the repository

```bash
git clone https://github.com/LeerPlatform/api-application.git
```

Start containers

```bash
docker-compose up -d
```

SSH into PHP container

```bash
docker-compose exec php sh
```

Install dependencies

```bash
composer install
```

Set application key

```bash
php artisan key:generate
```

Create storage link

```bash
php artisan storage:link
```

## Credits

* **Cyril de Wit** - _Creator_ - [cyrildewit](https://github.com/cyrildewit)

See also the list of [contributors](https://github.com/cyrildewit/eloquent-viewable/graphs/contributors) who participated in this project.

## Copyright

Copyright (C) 2021 [Leer Platform](https://github.com/LeerPlatform), [Cyril de Wit](https://github.com/cyrildewit)
