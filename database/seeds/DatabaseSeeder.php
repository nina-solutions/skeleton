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

        // $this->call(UserTableSeeder::class);
        //$this->call(DW_CANALESeeder::class);
        //$this->call(NAZIONISeeder::class);
        //$this->call(PROVSeeder::class);
        //$this->call(REGIONISeeder::class);
        //$this->call(PERIODICITASeeder::class);
        //$this->call(DW_UTILITASeeder::class);
        $this->call(DW_MACROCATEGORIESeeder::class);
        Model::reguard();
    }
}
