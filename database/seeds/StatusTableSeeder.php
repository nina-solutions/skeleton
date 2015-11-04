<?php

use Illuminate\Database\Seeder;
use FairHub\Models\Status as S;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        S::create(['id' => '1', 'name' => 'Bozza']);
        S::create(['id' => '2', 'name' => 'Revisionare']);
        S::create(['id' => '3', 'name' => 'Pubblicabile']);
        S::create(['id' => '4', 'name' => 'Pubblicato']);
        S::create(['id' => '5', 'name' => 'Archiviato']);
        S::create(['id' => '6', 'name' => 'Cancellato']);
    }
}
