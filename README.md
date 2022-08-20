 
### Project Setup Guide
#### To Setup the project you need to follow the steps:

- Clone the laravel project from git. `https://github.com/itabdulkader/task_list.git`.
- `cd project root`.
- Set Environment `cp .env.example .env`  ( Set Your Locale Env )
- Composer Install `php composer.phar install`
- Database Migration `php artisan migrate` 
 - Master Data Seeder `php artisan db:seed --class=DatabaseSeeder`

### Background Task  
- Generate QueueTable `php artisan queue:table`
- update .env file set QUEUE_CONNECTION=database instead of QUEUE_CONNECTION=sync  
- Run Queue in other terminal `php artisan queue:work`

## Running using 
   Artisan Server `php artisan serve`

## Unit Test 
    3 functions try them using `php artisan test`



