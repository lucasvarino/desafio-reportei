# Back end

O back end foi desenvolvido em Laravel 11, utilizando as seguintes ferramentas em conjunto

- [Laravel](https://laravel.com/) - Framework
- [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum) - API
- [Laravel JWT](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/) - Autenticação

## Setup

### Instalação

```bash
composer install
```

### Configuração

```bash
cp .env.example .env

php artisan key:generate

php artisan jwt:secret

php artisan migrate
```

### Iniciar servidor de desenvolvimento

```bash
php artisan serve
```
