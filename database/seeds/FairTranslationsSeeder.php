<?php

use Illuminate\Database\Seeder;
use FairHub\Models\FairTranslation as FT;

class FairTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FT::create(['fair_id'=>'1','language_id'=>'1','description'=>'La Nuova Agricoltura Da Fare E Da Pensare']);
        FT::create(['fair_id'=>'1','language_id'=>'2','description'=>'Making And Thinking The New Agriculture']);
        FT::create(['fair_id'=>'2','language_id'=>'1','description'=>'Salone Internazionale dell\'olio d\'oliva vergine ed extra-vergine']);
        FT::create(['fair_id'=>'2','language_id'=>'2','description'=>'International Exhibition of olive oil, virgin and extra-virgin olive oils']);
        FT::create(['fair_id'=>'3','language_id'=>'1','description'=>'Mostra Internazionale di marmi, pietre e tecnologie']);
        FT::create(['fair_id'=>'3','language_id'=>'2','description'=>'International Exhibition of Marble, Stone and Technology']);
        FT::create(['fair_id'=>'4','language_id'=>'1','description'=>'Fiera Internazionale Dei Cavalli E Salone Delle Attrezzature E Delle Attività Ippiche']);
        FT::create(['fair_id'=>'4','language_id'=>'2','description'=>'International Horse Fair And Exhibition Of Equestrian Activities And Equipment']);
        FT::create(['fair_id'=>'5','language_id'=>'1','description'=>'Giornate Internazionali dell\'Arredo']);
        FT::create(['fair_id'=>'5','language_id'=>'2','description'=>'International Exhibition of furniture, furnishing and interior design']);
        FT::create(['fair_id'=>'6','language_id'=>'1','description'=>'Salone internazionale macchine per movimento terra, da cantiere e per l\'edilizia']);
        FT::create(['fair_id'=>'6','language_id'=>'2','description'=>'International earthmoving and building machinery exhibition']);
        FT::create(['fair_id'=>'7','language_id'=>'1','description'=>'Salone Internazionale del Vino e dei Distillati']);
        FT::create(['fair_id'=>'7','language_id'=>'2','description'=>'International wine & spirits exhibition']);
        FT::create(['fair_id'=>'8','language_id'=>'1','description'=>'Salone Internazionale Dei Prodotti Ittici, Delle Tecnologie E Delle Attrezzature Per L\'Itticoltura']);
        FT::create(['fair_id'=>'8','language_id'=>'2','description'=>'International Biennal Exhibition of fish products, breeding equipment and technologies']);
        FT::create(['fair_id'=>'9','language_id'=>'1','description'=>'Salone internazionale delle tecniche per la viticoltura, l\'enologia e delle tecnologie olivicole ed olearie']);
        FT::create(['fair_id'=>'9','language_id'=>'2','description'=>'International exhibition technologies for viticolture, oenology and of technologies for olive growing and olive oil production']);
        FT::create(['fair_id'=>'10','language_id'=>'1','description'=>'Salone della salute e del benessere']);
        FT::create(['fair_id'=>'10','language_id'=>'2','description'=>'Exhibition of wellness and wellbeing']);
        FT::create(['fair_id'=>'11','language_id'=>'1','description'=>'Salone dell\'agroalimentare di qualità']);
        FT::create(['fair_id'=>'11','language_id'=>'2','description'=>'Quality agro-foods event\'s']);


        FT::create(['fair_id'=>'13','language_id'=>'1','description'=>'Fiera d\'arte moderna e contemporanea']);
        FT::create(['fair_id'=>'13','language_id'=>'2','description'=>'Modern and contemporary art fair']);
        FT::create(['fair_id'=>'14','language_id'=>'1','description'=>'Mostra dell\'abitare. Evento mostra mercato - Soluzioni d\'arredo classiche e moderne. Prodotti e servizi per la casa e gli sposi']);
        FT::create(['fair_id'=>'14','language_id'=>'2','description'=>'Classic and modern furniture solutions - Products and services for the house and the wedding day']);




        FT::create(['fair_id'=>'17','language_id'=>'1','description'=>'International Conference &amp; Expo']);
        FT::create(['fair_id'=>'17','language_id'=>'2','description'=>'International Conference &amp; Expo']);
        FT::create(['fair_id'=>'18','language_id'=>'1','description'=>'Fiera del riciclo industriale dei materiali']);
        FT::create(['fair_id'=>'18','language_id'=>'2','description'=>'Industrial recycling exhibition']);

        FT::create(['fair_id'=>'19','language_id'=>'1','description'=>'Salone Internazionale delle Tecnologie per Lavorazione, Conservazione, Refrigerazione e Distribuzione delle Carni']);
        FT::create(['fair_id'=>'19','language_id'=>'2','description'=>'International Exhibition for the Meat Industry']);


        FT::create(['fair_id'=>'21','language_id'=>'1','description'=>'Salone internazionale dell\'efficienza energetica']);
        FT::create(['fair_id'=>'21','language_id'=>'2','description'=>'International exhibition for energy efficiency']);
        FT::create(['fair_id'=>'22','language_id'=>'1','description'=>'Presentazione produzione vino novello']);
        FT::create(['fair_id'=>'22','language_id'=>'2','description'=>'Preview of novello wine production']);
        FT::create(['fair_id'=>'23','language_id'=>'1','description'=>'International bike exhibition']);
        FT::create(['fair_id'=>'23','language_id'=>'2','description'=>'International bike Exhibition']);
        FT::create(['fair_id'=>'24','language_id'=>'1','description'=>'International Techno-Bake Exhibition']);
        FT::create(['fair_id'=>'24','language_id'=>'2','description'=>'International Techno-Bake Exhibition']);
        FT::create(['fair_id'=>'25','language_id'=>'1','description'=>'Fiera internazionale di pietre, design, tecnologie, macchine movimento terra e per l\'edilizia.']);
        FT::create(['fair_id'=>'25','language_id'=>'2','description'=>'The international trade fair for stone design, tecnology, earth-moving and building machinery.']);
        FT::create(['fair_id'=>'26','language_id'=>'1','description'=>'Salone Internazionale Trasporti Logistica Italia']);
        FT::create(['fair_id'=>'26','language_id'=>'2','description'=>'Salone Internazionale Trasporti Logistica Italia']);
        FT::create(['fair_id'=>'27','language_id'=>'1','description'=>'Salone dei trasporti e della logistica']);
        FT::create(['fair_id'=>'27','language_id'=>'2','description'=>'Transport and Logistics Exhibition']);
    }
}
