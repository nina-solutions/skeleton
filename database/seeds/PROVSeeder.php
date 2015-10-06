<?php

use Illuminate\Database\Seeder;
use FairHub\Models\PROV as P;

class PROVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSERT INTO dw.dbo.PROV \(([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z\_]+)\) VALUES \(('[A-Za-z0-9]+')\, ('[\'A-Za-z0-9\-\_ \/\.]+')\, ('[A-Za-z0-9\(\)\-\_ \/\.\,\']+')\, ('[A-Za-z0-9\(\)\-\_ \/\.\,\']+')\, ([A-Za-z0-9\']+)\)\;
        //N::create(['$1'=>$6, '$2'=>$7, '$3'=>$8, '$4'=>$9, '$5'=>$10]);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AG', 'cdt_descr'=>'AGRIGENTO', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AL', 'cdt_descr'=>'ALESSANDRIA', 'cdt_codice_ricla'=>'12']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AN', 'cdt_descr'=>'ANCONA', 'cdt_codice_ricla'=>'10']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AO', 'cdt_descr'=>'AOSTA', 'cdt_codice_ricla'=>'19']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AP', 'cdt_descr'=>'ASCOLI PICENO', 'cdt_codice_ricla'=>'10']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AQ', 'cdt_descr'=>'L\'AQUILA', 'cdt_codice_ricla'=>'1']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AR', 'cdt_descr'=>'AREZZO', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AT', 'cdt_descr'=>'ASTI', 'cdt_codice_ricla'=>'12']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'AV', 'cdt_descr'=>'AVELLINO', 'cdt_codice_ricla'=>'4']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BA', 'cdt_descr'=>'BARI', 'cdt_codice_ricla'=>'13']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BG', 'cdt_descr'=>'BERGAMO', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BI', 'cdt_descr'=>'BIELLA', 'cdt_codice_ricla'=>'12']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BL', 'cdt_descr'=>'BELLUNO', 'cdt_codice_ricla'=>'20']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BN', 'cdt_descr'=>'BENEVENTO', 'cdt_codice_ricla'=>'4']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BO', 'cdt_descr'=>'BOLOGNA', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BR', 'cdt_descr'=>'BRINDISI', 'cdt_codice_ricla'=>'13']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BS', 'cdt_descr'=>'BRESCIA', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'BZ', 'cdt_descr'=>'BOLZANO', 'cdt_codice_ricla'=>'17']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CA', 'cdt_descr'=>'CAGLIARI', 'cdt_codice_ricla'=>'14']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CB', 'cdt_descr'=>'CAMPOBASSO', 'cdt_codice_ricla'=>'11']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CE', 'cdt_descr'=>'CASERTA', 'cdt_codice_ricla'=>'4']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CH', 'cdt_descr'=>'CHIETI', 'cdt_codice_ricla'=>'1']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CL', 'cdt_descr'=>'CALTANISSETTA', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CN', 'cdt_descr'=>'CUNEO', 'cdt_codice_ricla'=>'12']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CO', 'cdt_descr'=>'COMO', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CR', 'cdt_descr'=>'CREMONA', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CS', 'cdt_descr'=>'COSENZA', 'cdt_codice_ricla'=>'3']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CT', 'cdt_descr'=>'CATANIA', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'CZ', 'cdt_descr'=>'CATANZARO', 'cdt_codice_ricla'=>'3']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'EE', 'cdt_descr'=>'ESTERO', 'cdt_codice_ricla'=>'10']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'EN', 'cdt_descr'=>'ENNA', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'FC', 'cdt_descr'=>'FORLI-CESENA', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'FE', 'cdt_descr'=>'FERRARA', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'FG', 'cdt_descr'=>'FOGGIA', 'cdt_codice_ricla'=>'13']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'FI', 'cdt_descr'=>'FIRENZE', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'FO', 'cdt_descr'=>'FORLI', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'FR', 'cdt_descr'=>'FROSINONE', 'cdt_codice_ricla'=>'7']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'GE', 'cdt_descr'=>'GENOVA', 'cdt_codice_ricla'=>'8']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'GO', 'cdt_descr'=>'GORIZIA', 'cdt_codice_ricla'=>'6']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'GR', 'cdt_descr'=>'GROSSETO', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'IM', 'cdt_descr'=>'IMPERIA', 'cdt_codice_ricla'=>'8']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'IS', 'cdt_descr'=>'ISERNIA', 'cdt_codice_ricla'=>'11']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'KR', 'cdt_descr'=>'CROTONE', 'cdt_codice_ricla'=>'3']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'LC', 'cdt_descr'=>'LECCO', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'LE', 'cdt_descr'=>'LECCE', 'cdt_codice_ricla'=>'13']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'LI', 'cdt_descr'=>'LIVORNO', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'LO', 'cdt_descr'=>'LODI', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'LT', 'cdt_descr'=>'LATINA', 'cdt_codice_ricla'=>'7']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'LU', 'cdt_descr'=>'LUCCA', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'MB', 'cdt_descr'=>'MONZA BRIANZA', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'MC', 'cdt_descr'=>'MACERATA', 'cdt_codice_ricla'=>'10']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'ME', 'cdt_descr'=>'MESSINA', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'MI', 'cdt_descr'=>'MILANO', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'MN', 'cdt_descr'=>'MANTOVA', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'MO', 'cdt_descr'=>'MODENA', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'MS', 'cdt_descr'=>'MASSA CARRARA', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'MT', 'cdt_descr'=>'MATERA', 'cdt_codice_ricla'=>'2']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'NA', 'cdt_descr'=>'NAPOLI', 'cdt_codice_ricla'=>'4']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'NO', 'cdt_descr'=>'NOVARA', 'cdt_codice_ricla'=>'12']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'NU', 'cdt_descr'=>'NUORO', 'cdt_codice_ricla'=>'14']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'OR', 'cdt_descr'=>'ORISTANO', 'cdt_codice_ricla'=>'14']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PA', 'cdt_descr'=>'PALERMO', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PC', 'cdt_descr'=>'PIACENZA', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PD', 'cdt_descr'=>'PADOVA', 'cdt_codice_ricla'=>'20']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PE', 'cdt_descr'=>'PESCARA', 'cdt_codice_ricla'=>'1']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PG', 'cdt_descr'=>'PERUGIA', 'cdt_codice_ricla'=>'18']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PI', 'cdt_descr'=>'PISA', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PN', 'cdt_descr'=>'PORDENONE', 'cdt_codice_ricla'=>'6']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PO', 'cdt_descr'=>'PRATO', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PR', 'cdt_descr'=>'PARMA', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PS', 'cdt_descr'=>'PESARO', 'cdt_codice_ricla'=>'10']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PT', 'cdt_descr'=>'PISTOIA', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PU', 'cdt_descr'=>'PESARO-URBINO', 'cdt_codice_ricla'=>'10']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PV', 'cdt_descr'=>'PAVIA', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'PZ', 'cdt_descr'=>'POTENZA', 'cdt_codice_ricla'=>'2']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'RA', 'cdt_descr'=>'RAVENNA', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'RC', 'cdt_descr'=>'REGGIO CALABRIA', 'cdt_codice_ricla'=>'3']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'RE', 'cdt_descr'=>'REGGIO EMILIA', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'RG', 'cdt_descr'=>'RAGUSA', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'RI', 'cdt_descr'=>'RIETI', 'cdt_codice_ricla'=>'7']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'RM', 'cdt_descr'=>'ROMA', 'cdt_codice_ricla'=>'7']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'RN', 'cdt_descr'=>'RIMINI', 'cdt_codice_ricla'=>'5']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'RO', 'cdt_descr'=>'ROVIGO', 'cdt_codice_ricla'=>'20']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'SA', 'cdt_descr'=>'SALERNO', 'cdt_codice_ricla'=>'4']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'SI', 'cdt_descr'=>'SIENA', 'cdt_codice_ricla'=>'16']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'SO', 'cdt_descr'=>'SONDRIO', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'SP', 'cdt_descr'=>'LA SPEZIA', 'cdt_codice_ricla'=>'8']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'SR', 'cdt_descr'=>'SIRACUSA', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'SS', 'cdt_descr'=>'SASSARI', 'cdt_codice_ricla'=>'14']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'SV', 'cdt_descr'=>'SAVONA', 'cdt_codice_ricla'=>'8']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'TA', 'cdt_descr'=>'TARANTO', 'cdt_codice_ricla'=>'13']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'TE', 'cdt_descr'=>'TERAMO', 'cdt_codice_ricla'=>'1']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'TN', 'cdt_descr'=>'TRENTO', 'cdt_codice_ricla'=>'17']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'TO', 'cdt_descr'=>'TORINO', 'cdt_codice_ricla'=>'12']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'TP', 'cdt_descr'=>'TRAPANI', 'cdt_codice_ricla'=>'15']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'TR', 'cdt_descr'=>'TERNI', 'cdt_codice_ricla'=>'18']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'TS', 'cdt_descr'=>'TRIESTE', 'cdt_codice_ricla'=>'6']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'TV', 'cdt_descr'=>'TREVISO', 'cdt_codice_ricla'=>'20']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'UD', 'cdt_descr'=>'UDINE', 'cdt_codice_ricla'=>'6']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'VA', 'cdt_descr'=>'VARESE', 'cdt_codice_ricla'=>'9']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'VB', 'cdt_descr'=>'VERBANIA', 'cdt_codice_ricla'=>'12']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'VC', 'cdt_descr'=>'VERCELLI', 'cdt_codice_ricla'=>'12']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'VE', 'cdt_descr'=>'VENEZIA', 'cdt_codice_ricla'=>'20']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'VI', 'cdt_descr'=>'VICENZA', 'cdt_codice_ricla'=>'20']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'VR', 'cdt_descr'=>'VERONA', 'cdt_codice_ricla'=>'20']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'VT', 'cdt_descr'=>'VITERBO', 'cdt_codice_ricla'=>'7']);
        P::create(['cdt_ute'=>'01', 'cdt_nome_tab'=>'PROV', 'cdt_codice'=>'VV', 'cdt_descr'=>'VIBO VALENTIA', 'cdt_codice_ricla'=>'3']);
    }
}
