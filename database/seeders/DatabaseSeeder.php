<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Host;
use App\Models\Project\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    /**
     * Заполняем тестовыми данными БД
     * $user - Пользователи
     * $project - Проекты
     * $host - Хосты
     */
    public function run(): void
    {
        $faker = Faker::create();

         for ($i = 1; $i <= 10; $i++) {
             // Пользователи
             $user = User::create([
                 'name' => $faker->name(),
                 'email' => $faker->unique()->safeEmail,
                 'password' => Hash::make('123456'),
                 'enabled' => 1
             ]);

             // Проекты
             $project = Project::create([
                'user_id' => $user->id,
                'api_token' => Str::random(60),
                'timezone' => $faker->timezone,
                 'enabled' => 1,
                 'detect_region' => $faker->city,
                 'calltracking' => 0,
                 'leads_today' => 1,
                 'leads_total' => 12
             ]);

             // Хосты
             $host = Host::create([
                 'project_id' => $project->id,
                 'url' => $faker->url
             ]);
         }
    }
}
