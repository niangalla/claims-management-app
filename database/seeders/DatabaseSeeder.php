<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\{ Reclamation, Inscrit };

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Inscrit::factory(3)->create();
        // Inscrit::factory()->has(Reclamation::factory()->count(3))->count(4)->create();
    }
}
