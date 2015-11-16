<?php

use Illuminate\Database\Seeder;
use FairHub\Models\StatusTransition as S;

class StatusTransitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //From Bozza
        S::create(['from_status_id' => '1', 'to_status_id' => '1', 'name' => 'Salva Bozza']);
        S::create(['from_status_id' => '1', 'to_status_id' => '2', 'name' => 'Manda in revisione']);
        S::create(['from_status_id' => '1', 'to_status_id' => '6', 'name' => 'Elimina']);
        //from Revisione
        S::create(['from_status_id' => '2', 'to_status_id' => '2', 'name' => 'Aggiorna']);
        S::create(['from_status_id' => '2', 'to_status_id' => '3', 'name' => 'Pubblicabile']);
        S::create(['from_status_id' => '2', 'to_status_id' => '6', 'name' => 'Elimina']);
        //From Pubblicabile
        S::create(['from_status_id' => '3', 'to_status_id' => '2', 'name' => 'Manda in revisione']);
        S::create(['from_status_id' => '3', 'to_status_id' => '3', 'name' => 'Aggiorna']);
        S::create(['from_status_id' => '3', 'to_status_id' => '4', 'name' => 'Pubblica']);
        S::create(['from_status_id' => '3', 'to_status_id' => '5', 'name' => 'Archivia']);
        S::create(['from_status_id' => '3', 'to_status_id' => '6', 'name' => 'Elimina']);
        //from Pubblicato
        S::create(['from_status_id' => '4', 'to_status_id' => '2', 'name' => 'Sospendi']);
        S::create(['from_status_id' => '4', 'to_status_id' => '4', 'name' => 'Aggiorna']);
        S::create(['from_status_id' => '4', 'to_status_id' => '5', 'name' => 'Archivia']);
        S::create(['from_status_id' => '4', 'to_status_id' => '6', 'name' => 'Elimina']);
        //from Archiviato
        S::create(['from_status_id' => '5', 'to_status_id' => '2', 'name' => 'Manda in revisione']);
        S::create(['from_status_id' => '5', 'to_status_id' => '6', 'name' => 'Elimina']);
        //From Cancellato
        S::create(['from_status_id' => '6', 'to_status_id' => '1', 'name' => 'Riattiva']);
        S::create(['from_status_id' => '6', 'to_status_id' => '5', 'name' => 'Archivia']);
    }
}
