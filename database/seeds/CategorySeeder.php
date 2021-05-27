<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie = ['cinema', 'teatro', 'informatica', 'news', 'cucina', 'coding'];
        foreach ($categorie as $categoria){
            DB::table('categories')->insert([
                'name' =>  $categoria
        ]);
        }

    }
}
