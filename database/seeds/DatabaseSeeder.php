<?php

use App\Company;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CompanySeeder::class);

        $companies = Company::all();
        App\User::all()->each(function ($user) use ($companies) {
            $user->companies()->attach(
                $companies->random(rand(Company::min('id'), Company::min('id')))->pluck('id')->toArray()
            );
        });
    }
}
