<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TomatoPHP\FilamentTenancy\Models\Tenant;

class CoursesSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::all()->runForEach(function () {
            \App\Models\Course::factory()->count(10)->create();
        });
    }
}
