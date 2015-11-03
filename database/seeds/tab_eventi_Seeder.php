<?php

use Illuminate\Database\Seeder;
use FairHub\Models\tab_eventi as e;

class tab_eventi_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSERT INTO manifestazioni.dbo.tab_eventi \(([a-z\_]+), ([a-z\_]+), ([a-z\_]+), ([a-z\_]+)\) VALUES \(([0-9a-zA-Z\^\%\_\']+), ([0-9a-zA-Z\s\&\%\_\']+), ([0-9a-zA-Z\s\:\.\&\%\_\'\/\\]+), ([0-9a-zA-Z\s\:\.\^\%\_\'\/\\]+)\);
        //e::create(['$1' => $5, '$2' => $6, '$3' => $7, '$4' => $8]);
        e::create(['eve_id' => 3, 'eve_desc' => 'Sol & Agrifood', 'eve_href' => null, 'eve_codmanif' => 'SAG']);
        e::create(['eve_id' => 33, 'eve_desc' => 'CosmoBike Show', 'eve_href' => 'http://www.cosmobikeshow.com/', 'eve_codmanif' => 'CBS']);
        e::create(['eve_id' => 32, 'eve_desc' => 'Asphaltica', 'eve_href' => 'www.asphaltica.it', 'eve_codmanif' => null]);
        e::create(['eve_id' => 1, 'eve_desc' => 'Fieracavalli', 'eve_href' => null, 'eve_codmanif' => 'FIC']);
        e::create(['eve_id' => 2, 'eve_desc' => 'Fieragricola', 'eve_href' => 'http://www.fieragricola.com/2002/press_stampa.asp', 'eve_codmanif' => 'AGR']);
        e::create(['eve_id' => 4, 'eve_desc' => 'Samoter', 'eve_href' => null, 'eve_codmanif' => 'SAM']);
        e::create(['eve_id' => 5, 'eve_desc' => 'Acquacoltura', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 17, 'eve_desc' => 'VinoeOlio', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 19, 'eve_desc' => 'Agrifood', 'eve_href' => '', 'eve_codmanif' => null]);
        e::create(['eve_id' => 6, 'eve_desc' => 'Enolitech', 'eve_href' => null, 'eve_codmanif' => 'VIC']);
        e::create(['eve_id' => 7, 'eve_desc' => 'China Winitaly', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 8, 'eve_desc' => 'China International Wine Expo', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 9, 'eve_desc' => 'Infravia', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 10, 'eve_desc' => 'Istituzionali', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 11, 'eve_desc' => 'Italian Wine and Food Festival', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 12, 'eve_desc' => 'JOB', 'eve_href' => null, 'eve_codmanif' => 'JOB']);
        e::create(['eve_id' => 13, 'eve_desc' => 'Lifestyle', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 14, 'eve_desc' => 'Marmomacc', 'eve_href' => null, 'eve_codmanif' => 'MDM']);
        e::create(['eve_id' => 15, 'eve_desc' => 'Sol', 'eve_href' => null, 'eve_codmanif' => 'SOL']);
        e::create(['eve_id' => 16, 'eve_desc' => 'Vinitaly', 'eve_href' => null, 'eve_codmanif' => 'VIR']);
        e::create(['eve_id' => 18, 'eve_desc' => 'LifestyleFromItaly', 'eve_href' => null, 'eve_codmanif' => null]);
        e::create(['eve_id' => 20, 'eve_desc' => 'ExpoTransport', 'eve_href' => null, 'eve_codmanif' => 'TRT']);
        e::create(['eve_id' => 21, 'eve_desc' => 'SITL', 'eve_href' => '', 'eve_codmanif' => null]);
        e::create(['eve_id' => 22, 'eve_desc' => 'Vivi la casa', 'eve_href' => '', 'eve_codmanif' => null]);
        e::create(['eve_id' => 23, 'eve_desc' => 'SIAB', 'eve_href' => '', 'eve_codmanif' => 'SIA']);
        e::create(['eve_id' => 24, 'eve_desc' => 'Modelexpo', 'eve_href' => null, 'eve_codmanif' => 'MOD']);
        e::create(['eve_id' => 25, 'eve_desc' => 'Elettroexpo', 'eve_href' => null, 'eve_codmanif' => 'ELE']);
        e::create(['eve_id' => 26, 'eve_desc' => 'Eurocarne', 'eve_href' => '', 'eve_codmanif' => null]);
        e::create(['eve_id' => 27, 'eve_desc' => 'Fishtech', 'eve_href' => '', 'eve_codmanif' => null]);
        e::create(['eve_id' => 28, 'eve_desc' => 'Anteprima Novello', 'eve_href' => '', 'eve_codmanif' => null]);
        e::create(['eve_id' => 29, 'eve_desc' => 'Construction Day', 'eve_href' => '', 'eve_codmanif' => null]);
        e::create(['eve_id' => 30, 'eve_desc' => 'Abitare 100% Project', 'eve_href' => '', 'eve_codmanif' => 'ABT']);
    }
}
