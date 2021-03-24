<?php

use Illuminate\Database\Seeder;
use App\Category;


class CreateCategoriessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



         $Cats = [
            [
               
               'title'=>'Frontend Framework',
                'parent_id'=> 0,
            ],
            [
               'title'=>'Cars',
                'parent_id'=> 0,
            ],
            [
               'title'=>'Angular',
                'parent_id'=> 1,
            ],
            [
               'title'=>'React',
                'parent_id'=> 1,
            ],
            [
               'title'=>'Vue',
                'parent_id'=>1,
            ],
           [
               'title'=>'Ford',
                'parent_id'=>2,
            ],
            [
               'title'=>'Aston Martin',
                'parent_id'=>2,
            ],

        ]; 

        foreach ($Cats as $cat) {
            Category::create($cat);
        }
    }
}
