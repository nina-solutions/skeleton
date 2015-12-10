<?php

namespace FairHub\Models;

class DW_ANAGRAFICHE extends HubModel
{
    protected $table = 'DW_ANAGRAFICHE';
    public $timestamps = false;

    protected $primaryKey = 'ANA_ID';
    protected $connection = 'dw';


    /** Mutator: Force well formatted names.
     * We can improve this filter via implode and explode,
     * for name composed of many words.
     * @param $value string
     */
    public function setANA_NOMEAttribute($value){
        //mutator in Laravel is automatically called when a value is set in this case
        $this->attributes['ANA_NOME'] = ucfirst(strtolower($value));
    }

    /**Sorry for that, this field should be in DW_ANAGRAFICHE
     * is a fake many to many,
     * should be a belongs to utilita + has many anagrafiche
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function utilita(){
        return $this->hasManyThrough('FairHub\Models\DW_UTILITA','FairHub\Models\DW_RELANAUTY','UTY_ID','UT_ID','ANA_ID');
    }


    /**Sorry for that, this field should be in DW_ANAGRAFICHE
     * is a fake many to many,
     * should be a belongs to utilita + has many anagrafiche
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function categories(){
        return $this->hasManyThrough('FairHub\Models\DW_SOTTOCATEGORIE','FairHub\Models\DW_RELANAUTY','UTY_ID','UT_ID','ANA_ID');
    }

    //If you hate the way this Database is designed,
    //uniformity: if I want ID of any class, i just use id() method
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['ANA_ID'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    //instead of dirty stuff like CAMPO1 and CAMPO2
    /**
     * @return string
     */
    public function getDescriptionAttribute(){
        return $this->attributes['ANA_NOME'] . ' ' . $this->attributes['ANA_COGNOME'];
    }

    //If you hate the way this Database is designed,
    /**
     * @return string
     */
    public function getEmailAttribute(){
        return $this->attributes['ANA_EMAIL'];
    }

    //If you hate the way this Database is designed,
    /**
     * @return string
     */
    public function getCodeAttribute(){
        return $this->attributes['ANA_ANALISI_IN'];
    }

    protected $fillable = [
        'ANA_ANALISI_IN',
        'ANA_COGNOME',
        'ANA_NOME',
        'ANA_RAGSOC',
        'ANA_UBICAZIONE',
        'ANA_NCIV',
        'ANA_CAP',
        'ANA_LOCALITA',
        'ANA_PROV',
        'ANA_REGIONE',
        'ANA_NAZIONE',
        'ANA_STATO',
        'ANA_WWW',
        'ANA_EMAIL',
        'ANA_TELEFONO',
        'ANA_FAX',
        'ANA_CELLULARE',
        'ANA_CANALE',
        'ANA_CHIAVE',
        'ANA_CONSENSO',
        'ANA_TIMESC',
        'ANA_UTEC',
        'ANA_TIMESM',
        'ANA_UTEM',
        'ANA_CODE20',
        'ANA_CODE10',
        'ANA_PWD',
        'ANA_DATA_NASCITA',
        'ANA_LUOGO_NASCITA',
        'ANA_IMAGE1',
        'ANA_IMAGE2',
        'ANA_IMAGE3',
        'ANA_FILENAME1',
        'ANA_FILENAME2',
        'ANA_FILENAME3',
        'ANA_CONSENSOQRCODE',
        'ANA_IDRIACCREDITO',
        'ANA_USERNAME',
        'ANA_QUALIFICATESTO',
        'ANA_PIVA',
        'ANA_CFISCALE',
        'ANA_BRANDNAME',
        'ANA_FLAGPAG',
        'ANA_CONSENSO2',
        'ANA_OPTIN',
        'ANA_DATA_OPTIN',
        'ANA_PRIMA_VISITA',
        'ANA_TWITTER_ACCOUNT',
        'ANA_FILENAME4',
        'ANA_FILENAME5',
        'ANA_IMAGE4',
        'ANA_IMAGE5',
        'ANA_LINK_ARTICOLI',
        'ANA_NOTE',
        'ANA_SESSO',
    ];

    /*
ANA_ID INT NOT NULL IDENTITY,
ANA_ANALISI_IN VARCHAR(5) NOT NULL,
ANA_COGNOME VARCHAR(50),
ANA_NOME VARCHAR(50),
ANA_RAGSOC VARCHAR(50),
ANA_UBICAZIONE VARCHAR(100),
ANA_NCIV VARCHAR(20),
ANA_CAP VARCHAR(20),
ANA_LOCALITA VARCHAR(60),
ANA_PROV VARCHAR(2),
ANA_REGIONE VARCHAR(10),
ANA_NAZIONE VARCHAR(3),
ANA_STATO VARCHAR(30),
ANA_WWW VARCHAR(60),
ANA_EMAIL VARCHAR(60),
ANA_TELEFONO VARCHAR(60),
ANA_FAX VARCHAR(60),
ANA_CELLULARE VARCHAR(60),
ANA_CANALE INT,
ANA_CHIAVE VARCHAR(200),
ANA_CONSENSO VARCHAR(2),
ANA_TIMESC DATETIME NOT NULL,
ANA_UTEC VARCHAR(50),
ANA_TIMESM DATETIME,
ANA_UTEM VARCHAR(50),
ANA_CODE20 VARCHAR(20),
ANA_CODE10 VARCHAR(10),
ANA_PWD VARCHAR(25),
ANA_DATA_NASCITA DATETIME,
ANA_LUOGO_NASCITA VARCHAR(60),
ANA_IMAGE1 IMAGE,
ANA_IMAGE2 IMAGE,
ANA_IMAGE3 IMAGE,
ANA_FILENAME1 VARCHAR(100),
ANA_FILENAME2 VARCHAR(100),
ANA_FILENAME3 VARCHAR(100),
ANA_CONSENSOQRCODE VARCHAR(2),
ANA_IDRIACCREDITO INT,
ANA_USERNAME VARCHAR(60),
ANA_QUALIFICATESTO VARCHAR(200),
ANA_PIVA VARCHAR(20),
ANA_CFISCALE VARCHAR(20),
ANA_BRANDNAME VARCHAR(500),
ANA_FLAGPAG INT,
ANA_CONSENSO2 VARCHAR(5),
ANA_OPTIN VARCHAR(2),
ANA_DATA_OPTIN DATETIME,
ANA_PRIMA_VISITA BIT,
ANA_TWITTER_ACCOUNT VARCHAR(20),
ANA_FILENAME4 VARCHAR(100),
ANA_FILENAME5 VARCHAR(100),
ANA_IMAGE4 IMAGE,
ANA_IMAGE5 IMAGE,
ANA_LINK_ARTICOLI VARCHAR(1000),
ANA_NOTE VARCHAR(500),
ANA_SESSO VARCHAR(1)
*/
}
