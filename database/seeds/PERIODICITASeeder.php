<?php

use Illuminate\Database\Seeder;
use FairHub\Models\DW_PERIODICITA as DP;


class PERIODICITASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSERT INTO dw.dbo.DW_PERIODICITA \(([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z\_]+)\) VALUES \(([A-Za-z0-9]+)\, ('[\'A-Za-z0-9\-\_ \/\.]+')\, ('[A-Za-z0-9\(\)\-\_ \/\.\,\']+')\)\;
        //DP::create(['$1'=>$4, '$2'=>$5, '$3'=>$6]);
        DP::create(['PER_ID'=>2, 'PER_DESCRIZIONE_ITA'=>'Bimestrali', 'PER_DESCRIZIONE_ENG'=>'Bi-monthly']);
        DP::create(['PER_ID'=>3, 'PER_DESCRIZIONE_ITA'=>'Bisettimanali', 'PER_DESCRIZIONE_ENG'=>'Bi-weekly']);
        DP::create(['PER_ID'=>5, 'PER_DESCRIZIONE_ITA'=>'Mensili', 'PER_DESCRIZIONE_ENG'=>'Monthly']);
        DP::create(['PER_ID'=>6, 'PER_DESCRIZIONE_ITA'=>'Quadrimestrali', 'PER_DESCRIZIONE_ENG'=>'Three times a year']);
        DP::create(['PER_ID'=>7, 'PER_DESCRIZIONE_ITA'=>'Quindicinali', 'PER_DESCRIZIONE_ENG'=>'Fortnightly']);
        DP::create(['PER_ID'=>8, 'PER_DESCRIZIONE_ITA'=>'Quotidiani', 'PER_DESCRIZIONE_ENG'=>'Daily newspapers']);
        DP::create(['PER_ID'=>11, 'PER_DESCRIZIONE_ITA'=>'Semestrali', 'PER_DESCRIZIONE_ENG'=>'Bi-annual']);
        DP::create(['PER_ID'=>12, 'PER_DESCRIZIONE_ITA'=>'Settimanali', 'PER_DESCRIZIONE_ENG'=>'Weekly']);
        DP::create(['PER_ID'=>16, 'PER_DESCRIZIONE_ITA'=>'Trimestrali', 'PER_DESCRIZIONE_ENG'=>'Quarterly']);
        DP::create(['PER_ID'=>17, 'PER_DESCRIZIONE_ITA'=>'Altro', 'PER_DESCRIZIONE_ENG'=>'Other']);
        DP::create(['PER_ID'=>18, 'PER_DESCRIZIONE_ITA'=>'Annuali', 'PER_DESCRIZIONE_ENG'=>'Annuals']);
    }
}
