<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductCateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("product_cate")->insert([
            ['name' => 'cua'],
            ['name' => 'tom'],
            ['name' => 'ca'],
            ['name' => 'thit'],
            ['name' => 'rau'],
            ['name' => 'qua'],
            ['name' => 'gao'],
            ['name' => 'mi'],
            ['name' => 'banh'],
            ['name' => 'nuoc'],
        ]);
    }
}
