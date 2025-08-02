<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class FactorySeederHelper
{
    public static function seedInBatches(Factory $factory, int $total, int $batchSize, string $modelName): void
    {
        $model = new $modelName;
        $table = $model->getTable();

        $existing = DB::table($table)->count();

        if ($existing >= $total) {
            echo "Skipping seeding for {$modelName}, already has {$existing} records.\n";
            return;
        }

        $remaining = $total - $existing;
        $iterations = (int) ceil($remaining / $batchSize);

        echo "Seeding {$remaining} {$modelName}s in {$iterations} batches...\n";

        for ($i = 0; $i < $iterations; $i++) {
            $count = min($batchSize, $total - DB::table($table)->count());

            if ($count <= 0) {
                break; // Stop if already reached or exceeded total
            }

            $factory->count($count)->create();

            $current = DB::table($table)->count();
            echo "Seeded: {$current} {$modelName}s\n";
        }

        echo "Seeding complete.\n";
    }
}
