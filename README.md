
## News CRUD API app

### Steps followed for this project
1. To create a project using composer
```composer create-project laravel/laravel:^8.0 news```
2. To create model and migrations
```php artisan make:model News -m```
3. To create controller with default CRUD methods
```php artisan make:controller Api/NewsController -r```
4. To create factory
```php artisan make:factory NewsFactory --model=News```
5. To create tables first configure env file and run migration
```php artisan migrate```
6. To install authentication Laravel/ui 
```composer require laravel/ui```
```php artisan ui bootstrap --auth```
```npm install && npm run dev```
7. To feed database with seeder
```php artisan db:seed```
8. To create NewsServiceProvider
```php artisan make:provider NewsServiceProvider```
Configured singleton to use NewsInterface in NewsService in Services
Added to config/app.php => App\Providers\NewsServiceProvider::class,
9. To create an Event for news
```php artisan make:event NewsCreatedEvent```
And Listener
```php artisan make:listener NewsCreatedListener --event=NewsCreatedEvent```
10. To run CRON scheduled jobs locally
```php artisan schedule:work```
11. To create test for News
```php artisan make:test ManageNewsTest```
12. To test our cases
``` ./vendor/bin/phpunit```

#### Notes:
| Title | Descriptions |
|----|----|
| Api | ```routes/api.php```  with ```Sanctum``` middleware|
| Controller | ```App/Http/Controllers/Api/NewsController.php``` |
| Cron Job | Can be found ```App\Console\Kernel``` updates table daily |
|To run scheduler locally for CRON jobs| ```php artisan schedule:work ```
|User Factory | creates 10 users with password ```password```|
|News Factory | creates 50 news for randomly founded user|
|DB type | SQLITE|
|To test | Test API endpoint using POSTMAN|
|Postman file| in root file ```News.postman_collection.json```|
