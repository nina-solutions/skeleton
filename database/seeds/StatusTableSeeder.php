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
        S::create(['id' => '1', 'name' => 'Bozza', 'code' => 'default']);
        S::create(['id' => '2', 'name' => 'Revisionare', 'code' => 'warning']);
        S::create(['id' => '3', 'name' => 'Pubblicabile', 'code' => 'primary']);
        S::create(['id' => '4', 'name' => 'Pubblicato', 'code' => 'success']);
        S::create(['id' => '5', 'name' => 'Archiviato', 'code' => 'info']);
        S::create(['id' => '6', 'name' => 'Cancellato', 'code' => 'danger']);
    }
}
