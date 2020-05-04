<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
          $categories=['Genel',"Eglence",'Elm','Sagliq','Spor','Gunluk Yasam'];
           foreach ($categories as $category){
               DB::table('categories')->insert([

                   'name'=>$category,
                   'slug'=>str_slug($category),
                   'created_at'=>now(),
                   'updated_at'=>now()

               ]);
           }

    }
}
