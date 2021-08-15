<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

use function PHPUnit\Framework\directoryExists;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!file_exists(public_path('storage/images'))) {
            mkdir(public_path('storage/images'));
        }
        Product::factory(1)->create();
        $this->call(OrderAdminSeeder::class);
    }
}
