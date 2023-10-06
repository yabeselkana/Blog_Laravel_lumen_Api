<?php

namespace Database\Seeders;
use App\Models\blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker ;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        for ($i=0; $i < 100 ; $i++) { 
            $data = [
                'idkatagori' => $faker -> randomDigitNotNull ,
                'nama' => $faker -> name,
                'jenis_kelamin' => $faker ->titleMale ,
                'umur' =>  $faker ->numerify('##') , 
                'alamat' =>  $faker ->address ,   
                'tanggal_waktu' =>  $faker ->dateTimeAD ,   
                'isi_blog' =>  $faker -> text($maxNbChars = 200)      
                
            ];
            blog::create($data);

        }
    }
}