<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $category1 = new Category;
        $category1->name = "Deportes";
        $category1->description = "Categoría basada en deportes como, futbol, baloncesto, tenis...";
        $category1->active = true;
        $category1->save();

        $category2 = new Category;
        $category2->name = "Acción";
        $category2->description = "Categoría basada en juegos repletos de acción.";
        $category2->active = true;
        $category2->save();

        $category3 = new Category;
        $category3->name = "Aventuras";
        $category3->description = "Categoría basada en juegos trepidantes y llenos de misterios.";
        $category3->active = true;
        $category3->save();

        $category4 = new Category;
        $category4->name = "RPG";
        $category4->description = "Categoría basada en juegos de rol.";
        $category4->active = true;
        $category4->save();
    }
}
