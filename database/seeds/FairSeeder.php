<?php

use Illuminate\Database\Seeder;
use FairHub\Models\Fair as F;

class FairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        F::create(['id'=>1,'code'=>'AGR', 'name'=>'Fieragricola']);
        F::create(['id'=>2,'code'=>'SOL', 'name'=>'Sol']);
        F::create(['id'=>3,'code'=>'MDM', 'name'=>'Marmomacc']);
        F::create(['id'=>4,'code'=>'FIC', 'name'=>'Fieracavalli']);
        F::create(['id'=>5,'code'=>'ABT', 'name'=>'Abitare il Tempo']);
        F::create(['id'=>6,'code'=>'SAM', 'name'=>'Samoter']);
        F::create(['id'=>7,'code'=>'VIR', 'name'=>'Vinitaly']);
        F::create(['id'=>8,'code'=>'AQU', 'name'=>'Acquacoltura']);
        F::create(['id'=>9,'code'=>'VIC', 'name'=>'Enolitech']);
        F::create(['id'=>10,'code'=>'HER', 'name'=>'LifeStyle']);
        F::create(['id'=>11,'code'=>'FOO', 'name'=>'Agrifood']);
        F::create(['id'=>12,'code'=>'BIO', 'name'=>'Biologia Molecolare']);
        F::create(['id'=>13,'code'=>'ART', 'name'=>'Art Verona']);
        F::create(['id'=>14,'code'=>'VIV', 'name'=>'Vivi la Casa']);
        F::create(['id'=>15,'code'=>'FRU', 'name'=>'FRU']);
        F::create(['id'=>16,'code'=>'IDN', 'name'=>'IDN']);
        F::create(['id'=>17,'code'=>'GBE', 'name'=>'Greenbuild Europe &amp; the Mediterranean']);
        F::create(['id'=>18,'code'=>'MET', 'name'=>'Metalriciclo - Recomat']);
        F::create(['id'=>19,'code'=>'EUC', 'name'=>'Eurocarne']);
        F::create(['id'=>20,'code'=>'LEG', 'name'=>'LEG']);
        F::create(['id'=>21,'code'=>'SMA', 'name'=>'Smart Energy Expo']);
        F::create(['id'=>22,'code'=>'NOV', 'name'=>'Anteprima Novello']);
        F::create(['id'=>23,'code'=>'CBS', 'name'=>'CosmoBike Show']);
        F::create(['id'=>24,'code'=>'SIA', 'name'=>'SIAB Brazil']);
        F::create(['id'=>25,'code'=>'MSA', 'name'=>'Ms Africa &amp; Middle East - Cairo - Egypt']);
        F::create(['id'=>26,'code'=>'STL', 'name'=>'SITL Italia']);
        F::create(['id'=>27,'code'=>'TPT', 'name'=>'Transpotec &amp; Logitec']);
    }
}
