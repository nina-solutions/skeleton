<?php

use Illuminate\Database\Seeder;
use FairHub\Models\DW_CANALE as C;

class DW_CANALESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSERT INTO dw.dbo.DW_CANALE \(([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z\_]+)\, ([A-Za-z\_]+)\) VALUES \(([A-Za-z0-9]+)\, ('[\'A-Za-z0-9\-\_ \/\.]+')\, ([\'A-Za-z0-9\-\_ \/\.]+)\, ('[SI|NO]+')\, ('[0-9\- \:\.]+')\, ([\'A-Za-z0-9\-\_ \/\.\:]+)\);
        //'$1'=>$7, '$2'=>$8, '$3'=>$9, '$4'=>$10, '$5'=>$11, '$6'=>$12
        C::create(['CAN_ID'=>1, 'CAN_DESCRIZIONE'=>'Cartoline invito personalizzate', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-06-01 16:54:39.233', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>2, 'CAN_DESCRIZIONE'=>'Abilitazione cartoline invito', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-06-01 16:55:01.420', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>3, 'CAN_DESCRIZIONE'=>'Pre-registrazioni operatori', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-06-01 16:55:20.047', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>4, 'CAN_DESCRIZIONE'=>'Email-richiesta info', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-06-01 16:55:39.093', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>5, 'CAN_DESCRIZIONE'=>'Biglietti da visita', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-06-01 16:55:46.467', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>6, 'CAN_DESCRIZIONE'=>'Scatoloni', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-06-01 16:55:51.623', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>7, 'CAN_DESCRIZIONE'=>'Richiesta biglietti Architetti', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-09-01 09:00:12.973', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>8, 'CAN_DESCRIZIONE'=>'Richiesta biglietti Convegni', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-09-01 09:00:29.270', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>9, 'CAN_DESCRIZIONE'=>'Newsletter', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2005-09-30 12:59:06.783', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>10, 'CAN_DESCRIZIONE'=>'Free-badge', 'CAN_NOTE'=>'Utilizzato per banner Vinitaly', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2006-01-12 18:33:21.247', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>11, 'CAN_DESCRIZIONE'=>'Registrazione buyers', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2006-02-02 17:59:48.990', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>12, 'CAN_DESCRIZIONE'=>'Registrazione MyTour', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2006-03-23 14:55:03.430', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>13, 'CAN_DESCRIZIONE'=>'Iscrizione Conferenze', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2006-04-12 11:20:30.907', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>14, 'CAN_DESCRIZIONE'=>'Prenotazione Biglietto', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2006-06-13 12:38:08.633', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>15, 'CAN_DESCRIZIONE'=>'Iscrizione Tour manifestazione all\'estero', 'CAN_NOTE'=>'Utilizzato su SAMOTER tour', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2006-09-22 12:37:40.573', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>16, 'CAN_DESCRIZIONE'=>'Free-badge estero', 'CAN_NOTE'=>'Utilizzato per biglietti servizio estero e delegati', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2007-01-16 00:00:00.000', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>17, 'CAN_DESCRIZIONE'=>'Selection Germania', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2007-02-13 11:39:42.177', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>18, 'CAN_DESCRIZIONE'=>'Studi e ricerche', 'CAN_NOTE'=>'Utilizzato per Vinitaly', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2007-07-16 09:40:38.953', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>19, 'CAN_DESCRIZIONE'=>'Newsletter VeronaMarmorea', 'CAN_NOTE'=>'Utilizzato per l\'iscrizione alla newsletter verona marmorea di marmomacc', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2007-07-19 11:23:01.613', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>20, 'CAN_DESCRIZIONE'=>'Giornalista con TO', 'CAN_NOTE'=>'Usato da Uff.St. per giornalisti con TO', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2008-01-22 10:18:05.060', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>21, 'CAN_DESCRIZIONE'=>'Anteprima Novello', 'CAN_NOTE'=>'Anteprima Novello', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2008-09-29 16:40:09.417', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>22, 'CAN_DESCRIZIONE'=>'Iscrizione Convegni', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2009-04-14 15:24:53.913', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>23, 'CAN_DESCRIZIONE'=>'Collaboratore', 'CAN_NOTE'=>'Usato da Uff.St. per collaboratori no TO', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2010-02-11 10:51:49.553', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>24, 'CAN_DESCRIZIONE'=>'Fotografo', 'CAN_NOTE'=>'Usato da Uff.St. per fotografo', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2010-02-18 10:04:15.717', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>25, 'CAN_DESCRIZIONE'=>'Operatore VIDEO', 'CAN_NOTE'=>'Usato da Uff.St. per video operatori', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2010-02-18 10:04:35.340', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>26, 'CAN_DESCRIZIONE'=>'WEB', 'CAN_NOTE'=>'Usato da Uff.St. per operatori web', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2010-02-18 10:04:46.640', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>27, 'CAN_DESCRIZIONE'=>'Samoter-SolGroup', 'CAN_NOTE'=>'Usato per i giornalisti di SolGroup ', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2011-01-20 17:02:39.150', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>28, 'CAN_DESCRIZIONE'=>'Biglietti Omaggio x Associazioni', 'CAN_NOTE'=>'Iniziativa fornitura biglietti a Associazioni', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2012-02-13 12:24:10.330', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>29, 'CAN_DESCRIZIONE'=>'Prenotazione degustazione Gambero Rosso', 'CAN_NOTE'=>'Invito solo per espositori italiani ed esteri', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2012-02-20 09:08:50.777', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>30, 'CAN_DESCRIZIONE'=>'Blogger', 'CAN_NOTE'=>'Blogger', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2013-02-11 17:59:38.520', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>31, 'CAN_DESCRIZIONE'=>'Iscrizione al sito di manifestazione', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2013-10-31 15:40:36.920', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>32, 'CAN_DESCRIZIONE'=>'Iscrizione Sito Manifestazione/Newsletter', 'CAN_NOTE'=>'Usato da SmartEnergyExpo per l\'iscrizione ai servizi del sito e alla newsletter di SmartEnergyExpo', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2013-11-05 17:39:22.080', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>33, 'CAN_DESCRIZIONE'=>'Giornalista con TO-Collaboratore stranieri', 'CAN_NOTE'=>'Usato per accredito dei giornalisti stranieri ', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2014-03-17 00:00:00.000', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>34, 'CAN_DESCRIZIONE'=>'Riduzione biglietto ristoratori', 'CAN_NOTE'=>null, 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2014-07-01 10:18:39.307', 'CAN_UTEC'=>null]);
        C::create(['CAN_ID'=>35, 'CAN_DESCRIZIONE'=>'Iscrizione a manif/premi/in.speciali', 'CAN_NOTE'=>'Usata ad esempio per CosmoBikeTech Award', 'CAN_VISIBILE'=>'SI', 'CAN_TIMESC'=>'2015-06-03 00:00:00.000', 'CAN_UTEC'=>null]);
    }
}
