<?php

use Illuminate\Database\Seeder;
use FairHub\Fair as F;

class FairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        F::create(['code'=>'AGR', 'name'=>'Fieragricola']);
        F::create(['code'=>'SOL', 'name'=>'Sol']);
        F::create(['code'=>'MDM', 'name'=>'Marmomacc']);
        F::create(['code'=>'FIC', 'name'=>'Fieracavalli']);
        F::create(['code'=>'ABT', 'name'=>'Abitare il Tempo']);
        F::create(['code'=>'SAM', 'name'=>'Samoter']);
        F::create(['code'=>'VIR', 'name'=>'Vinitaly']);
        F::create(['code'=>'AQU', 'name'=>'Acquacoltura']);
        F::create(['code'=>'VIC', 'name'=>'Enolitech']);
        F::create(['code'=>'HER', 'name'=>'LifeStyle']);
        F::create(['code'=>'FOO', 'name'=>'Agrifood']);

    }
}
