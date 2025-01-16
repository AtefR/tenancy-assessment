## About Laravel

This project is created as assessment for job application.

## How

I've used Laravel 11, with Filament 3 for the dashboard and [TenancyForLaravel](https://tenancyforlaravel.com/) for multi-tenancy.
Tenancy isn't supported with Filament, so I used [Filament-Tenancy](https://github.com/tomatophp/filament-tenancy) , it didn't support single-database tenancies.
so I created [a fork](https://github.com/AtefR/filament-tenancy) and made the necessary edit and made a pull request to it.

## Installation

1. Clone the project using
    `git clone https://github.com/AtefR/tenancy-assessment`

2. Install composer and npm packages
    `
        composer install && npm install && npm run build
    `

3. create the .env using this command.
    
    `
    cp .env.example .env
    `
    
    and edit `CENTRAL_DOMAIN=` to match the central domain.

4. then run the migration & the seeder

   `
        php artisan migrate:fresh --seed
   `

the application now should be ready now and accessible using the central domain,
default admin credentials are:
    email: admin@test.test
    password: password

after creating tenants courses can be seeded using this command:

`php artisan db:seed --class=CoursesSeeder`
