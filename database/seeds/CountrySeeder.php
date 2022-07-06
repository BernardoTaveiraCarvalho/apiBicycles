<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayName= array(
            'Portugal','Espanha','França','Polónia'
        );

        foreach ($arrayName as $array){
            \DB::table('countries')->insert([
                'name'      => $array ,
                'created_at'=> now(),
                'updated_at' =>now(),
                'deleted_at' =>now(), /*não por se tiver o soft delete*/
            ]);
        }
    }
}
