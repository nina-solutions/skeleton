<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(UserTableSeeder::class);
        //$this->call(DW_CANALESeeder::class);
        //$this->call(NAZIONISeeder::class);
        //$this->call(PROVSeeder::class);
        //$this->call(REGIONISeeder::class);
        //$this->call(PERIODICITASeeder::class);
        //$this->call(DW_UTILITASeeder::class);
        //$this->call(DW_MACROCATEGORIESeeder::class);
        //$this->call(DW_SOTTOCATEGORIESeeder::class);
        //$this->call(LanguageSeeder::class);
        //$this->call(FairSeeder::class);
        //$this->call(FairTranslationsSeeder::class);
        //$this->call(FairEditionsSeeder::class);
        //$this->call(tab_lingue_Seeder::class);
        //$this->call(tab_eventi_Seeder::class);
        //$this->call(tab_categorie_Seeder::class);
        //$this->call(RoleTableSeeder::class);
        //$this->call(StatusTableSeeder::class);
        //$this->call(StatusTransitionTableSeeder::class);

        Model::reguard();
    }
}
