<?php

use Illuminate\Database\Seeder;
use FairHub\Models\Role as R;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creare altri utenti, dare e togliere permessi
        R::create(['name' => 'Admin']);
        //Dare permessi di Writer, pubblicare, scrivere e modificare tutto
        R::create(['name' => 'Editor']);
        //Scrivere e modificare i propri contenuti
        R::create(['name' => 'Writer']);
    }
}
