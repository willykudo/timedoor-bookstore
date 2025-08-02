<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Helpers\FactorySeederHelper;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // sesuaikan data yang diisi sesuai kemampuan perangkat(saran 5000 per batch) 
        FactorySeederHelper::seedInBatches(Book::factory(), 100000, 5000, Book::class);
    }
}
