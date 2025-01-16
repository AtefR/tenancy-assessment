<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Tenant::all()->runForEach(function () {
            \App\Models\Course::factory()->create();
        });
    }
}
