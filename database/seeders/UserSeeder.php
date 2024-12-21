<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'tps1.11.09.07.2008',
                'village_id' => 1,
                'address' => 'TPS Latiung Jln 1',
            ],
            [
                'username' => 'tps2.11.09.07.2008',
                'village_id' => 1,
                'address' => 'TPS Latiung Jln 2',
            ],
        ]);
    }
}
