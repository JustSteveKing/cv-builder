<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Company;
use App\Models\JobTitle;
use App\Models\Share;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Steve McDougall',
            'email' => 'juststevemcd@gmail.com',
        ]);

        JobTitle::factory(20)->create();
        Company::factory(10)->create();

        Share::factory(5)->create([
            'profile_id' => $user->profile->id,
        ]);
    }
}
