<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Category;
use illuminate\Support\Facades\Schema;
use illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();
        $file = File::get('database/data/cenverted_data.json');
        $data = json_decode($file);
        foreach ($data as $item) {
            Category::create([
                "id" => $item->id,
                "name" => $item->name,
                "biaya_tambahan" => $item->biaya_tambahan,
            ]);
        }
        Category::factory()->count(50)->create();
    }
}
