<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'allesonline',
            'fullname' => 'Administrator',
            'email' => 'admin@allesonline.eu',
            'password' => bcrypt('NiksOffline14'),
        ]);
    }
}
