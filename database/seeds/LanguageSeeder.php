<?php

use Illuminate\Database\Seeder;
use FairHub\Models\Language as L;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        L::create(['code'=>'it', 'description'=>'Italiano']);
        L::create(['code'=>'en', 'description'=>'English']);
    }
}
