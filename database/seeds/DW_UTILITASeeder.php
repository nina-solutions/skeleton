<?php

use Illuminate\Database\Seeder;
use FairHub\Models\DW_UTILITA as DU;

class DW_UTILITASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSERT INTO dw.dbo.DW_UTILITA \(([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z0-9\_]+)\, ([A-Za-z0-9\_]+)\) VALUES \(([A-Za-z0-9]+)\, ('[\'A-Za-z0-9\-\_ \/\.]+')\, ('[\'A-Za-z0-9\-\_ \/\.]+')\, ('[\'A-Za-z0-9\-\_ \/\.]+')\)\;
        //DU::create(['$1'=>$5, '$2'=>$6, '$3'=>$7, '$4'=>$8]);
        DU::create(['UT_ID'=>1, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Agenzia di stampa', 'UT_CAMPO2'=>'Press agency']);
        DU::create(['UT_ID'=>2, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Blog', 'UT_CAMPO2'=>'Blog']);
        DU::create(['UT_ID'=>3, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Free press', 'UT_CAMPO2'=>'Free press']);
        DU::create(['UT_ID'=>4, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Magazine di un quotidiano', 'UT_CAMPO2'=>'Newspaper manager']);
        DU::create(['UT_ID'=>5, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Periodico', 'UT_CAMPO2'=>'Periodical']);
        DU::create(['UT_ID'=>6, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Quotidiano', 'UT_CAMPO2'=>'Daily newspaper']);
        DU::create(['UT_ID'=>7, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Quotidiano sportivo', 'UT_CAMPO2'=>'Sport daily newspaper']);
        DU::create(['UT_ID'=>8, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Radio', 'UT_CAMPO2'=>'Radio']);
        DU::create(['UT_ID'=>9, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Rivista di settore', 'UT_CAMPO2'=>'Trade magazine']);
        DU::create(['UT_ID'=>10, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Stampa estera in Italia', 'UT_CAMPO2'=>'Foreign press in Italy']);
        DU::create(['UT_ID'=>11, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Televisione', 'UT_CAMPO2'=>'Television stations']);
        DU::create(['UT_ID'=>12, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Testata online', 'UT_CAMPO2'=>'Online publications ']);
        DU::create(['UT_ID'=>13, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Ufficio stampa', 'UT_CAMPO2'=>'Press office']);
        DU::create(['UT_ID'=>14, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Web TV', 'UT_CAMPO2'=>'Web TV']);
        DU::create(['UT_ID'=>15, 'UT_TIPO'=>'LAVORO', 'UT_CAMPO1'=>'Web Radio', 'UT_CAMPO2'=>'Web Radio']);
        DU::create(['UT_ID'=>16, 'UT_TIPO'=>'NL_TIPOVISITATORE', 'UT_CAMPO1'=>'Operatore', 'UT_CAMPO2'=>'Trade']);
        DU::create(['UT_ID'=>17, 'UT_TIPO'=>'NL_TIPOVISITATORE', 'UT_CAMPO1'=>'Appassionato', 'UT_CAMPO2'=>'Lover']);
        DU::create(['UT_ID'=>18, 'UT_TIPO'=>'MANIFESTAZIONE', 'UT_CAMPO1'=>'MDM', 'UT_CAMPO2'=>'MDM14']);
        DU::create(['UT_ID'=>19, 'UT_TIPO'=>'MANIFESTAZIONE', 'UT_CAMPO1'=>'VIR', 'UT_CAMPO2'=>'VIR15']);
        DU::create(['UT_ID'=>20, 'UT_TIPO'=>'MANIFESTAZIONE', 'UT_CAMPO1'=>'SMA', 'UT_CAMPO2'=>'SMA15']);
        DU::create(['UT_ID'=>21, 'UT_TIPO'=>'MANIFESTAZIONE', 'UT_CAMPO1'=>'GBE', 'UT_CAMPO2'=>'GBE15']);
        DU::create(['UT_ID'=>22, 'UT_TIPO'=>'MANIFESTAZIONE', 'UT_CAMPO1'=>'EUC', 'UT_CAMPO2'=>'EUC15']);
        DU::create(['UT_ID'=>23, 'UT_TIPO'=>'MANIFESTAZIONE', 'UT_CAMPO1'=>'SAM', 'UT_CAMPO2'=>'SAM15']);
        DU::create(['UT_ID'=>24, 'UT_TIPO'=>'MANIFESTAZIONE', 'UT_CAMPO1'=>'FIC', 'UT_CAMPO2'=>'FIC15']);
        DU::create(['UT_ID'=>25, 'UT_TIPO'=>'MANIFESTAZIONE', 'UT_CAMPO1'=>'AGR', 'UT_CAMPO2'=>'AGR16']);

    }
}
