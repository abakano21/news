<p>
    News Laravel project
</p>

## About project

    This project for listing news, only authors of a post can update it.

## Steps to run it locally

1. Update dependencies backend `composer install`
2. Update dependencies frontend `npm install`
3. Create environment file and set DB name with correct credentials
4. Migrate DB files `php artisan migrate`
5. Public storage symbolic link `php artisan storage:link`
6. Set in env file `FILESYSTEM_DRIVER=public`

## Used technologies

1. PHP - Laravel framework v 8
2. Tailwindcss
3. HTML
