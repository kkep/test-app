<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Country;
use App\Models\Department;
use App\Models\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();



//        Department::factory()->createMany([
//            ['name' => 'accounting department'],
//            ['name' => 'administrative staff'],
//            ['name' => 'board of directors'],
//            ['name' => 'catering'],
//            ['name' => 'chairman'],
//            ['name' => 'finance department'],
//            ['name' => 'finance department'],
//            ['name' => 'IT department'],
//        ]);
//
//        Job::factory()->createMany([
//            ['name' => 'Chief Accountant', 'department_id' => '1'],
//            ['name' => 'accountant', 'department_id' => '1'],
//            ['name' => 'Admin', 'department_id' => '2'],
//            ['name' => 'director', 'department_id' => '3'],
//            ['name' => 'cook', 'department_id' => '4'],
//            ['name' => 'Chef', 'department_id' => '4'],
//        ]);
//
        Country::factory(5)->create();
        Department::factory(3)->has(Job::factory()->count(2), 'jobs')->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'country_id' => 1,
             'password' => '1234',
             'email' => 'test@example.com',
         ]);
    }
}
