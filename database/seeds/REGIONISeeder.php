<?php

use Illuminate\Database\Seeder;
use FairHub\REGIONI as R;

class REGIONISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'01', 'CDT_DESCR'=>'ABRUZZO', 'CDT_CODICE_RICLA'=>'1']);
        //R::create(['$1'=>$6, '$2'=>$7, '$3'=>$8, '$4'=>$9, '$5'=>$10]);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'01', 'CDT_DESCR'=>'ABRUZZO', 'CDT_CODICE_RICLA'=>'1']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'02', 'CDT_DESCR'=>'BASILICATA', 'CDT_CODICE_RICLA'=>'2']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'03', 'CDT_DESCR'=>'CALABRIA', 'CDT_CODICE_RICLA'=>'3']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'04', 'CDT_DESCR'=>'CAMPANIA', 'CDT_CODICE_RICLA'=>'4']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'05', 'CDT_DESCR'=>'EMILIA ROMAGNA', 'CDT_CODICE_RICLA'=>'5']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'06', 'CDT_DESCR'=>'FRIULI VENEZIA E GIULIA', 'CDT_CODICE_RICLA'=>'6']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'07', 'CDT_DESCR'=>'LAZIO', 'CDT_CODICE_RICLA'=>'7']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'08', 'CDT_DESCR'=>'LIGURIA', 'CDT_CODICE_RICLA'=>'8']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'09', 'CDT_DESCR'=>'LOMBARDIA', 'CDT_CODICE_RICLA'=>'9']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'10', 'CDT_DESCR'=>'MARCHE', 'CDT_CODICE_RICLA'=>'10']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'11', 'CDT_DESCR'=>'MOLISE', 'CDT_CODICE_RICLA'=>'11']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'12', 'CDT_DESCR'=>'PIEMONTE', 'CDT_CODICE_RICLA'=>'12']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'13', 'CDT_DESCR'=>'PUGLIA', 'CDT_CODICE_RICLA'=>'13']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'14', 'CDT_DESCR'=>'SARDEGNA', 'CDT_CODICE_RICLA'=>'14']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'15', 'CDT_DESCR'=>'SICILIA', 'CDT_CODICE_RICLA'=>'15']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'16', 'CDT_DESCR'=>'TOSCANA', 'CDT_CODICE_RICLA'=>'16']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'17', 'CDT_DESCR'=>'TRENTINO ALTO ADIGE', 'CDT_CODICE_RICLA'=>'17']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'18', 'CDT_DESCR'=>'UMBRIA', 'CDT_CODICE_RICLA'=>'18']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'19', 'CDT_DESCR'=>'VALLE D\'AOSTA', 'CDT_CODICE_RICLA'=>'19']);
        R::create(['CDT_UTE'=>'01', 'CDT_NOME_TAB'=>'REGI', 'CDT_CODICE'=>'20', 'CDT_DESCR'=>'VENETO', 'CDT_CODICE_RICLA'=>'20']);
    }
}
