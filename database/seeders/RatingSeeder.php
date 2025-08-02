<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Helpers\FactorySeederHelper;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Rating;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // sesuaikan data yang diisi sesuai kemampuan perangkat(saran 5000 per batch) 
        FactorySeederHelper::seedInBatches(Rating::factory(), 500000, 5000, Rating::class);
    }
}
