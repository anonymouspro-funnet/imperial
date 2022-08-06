

# Imperial Fleet Management System

## Development Area

### Building

The following installation will require you to have GIT, PHP and Composer installed on
your local machine.

#### Build

Clone repo and initial configuration:
```
git clone git@bitbucket.org:anonymouspro-funnet/imperial.git
cd imperial
composer install
cp .env.example .env
php artisan migrate:refresh --seed

```

### Authentication

The application implements a Bearer Token authorization
for some of the endpoint, please refer to the database seeder for sample
credentials to obtain the token.




