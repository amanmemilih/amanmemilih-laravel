<?php

namespace Database\Seeders;

use App\Models\PresidentialCandidat;
use Illuminate\Database\Seeder;

class PresidentialCandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PresidentialCandidat::insert([
            [
                'no' => 1,
                'name' => 'Anies & Cak Imin',
            ],
            [
                'no' => 2,
                'name' => 'Prabowo & Gibran',
            ],
            [
                'no' => 3,
                'name' => 'Ganjar & Mahfud',
            ],
        ]);
    }
}
