<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormTest extends TestCase
{
    //use DatabaseTransactions;
    //use DatabaseMigrations;
    /**
     * A basic functional test example.
     *
     * @return void
     */

    public function testHome()
    {
        $this->visit('/')
            ->see('Laravel Rulez');
    }

    /**
     * we forget the is other flag and the human test.
     *
     * @return void
     */
    public function testWrongForm()
    {
        $this->visit('/it/press-accreditation/register/giornalista/VIR14')
            ->see('Registrazione')
            ->dontSee('Thank you')
            ->type('test', 'ANA_NOME')
            ->type('test', 'ANA_COGNOME')
            ->type('1', 'AS_TESSERA')
            ->type('test@karoly.com', 'ANA_EMAIL')
            ->type('347532265', 'ANA_CELLULARE')
            ->select('2681', 'SOC_ID')
            ->select('1','UTY_ID')
            ->type('sabau', 'ANA_TWITTER_ACCOUNT')
            ->type('TEST' ,'AS_NOME_TESTATA')
            ->type('TEST' ,'AS_ADDRESS')
            ->type('TEST' ,'AS_CITY')
            ->type('33333' ,'AS_CAP')
            ->select('AG' ,'AS_COUNTRY')
            ->select('IT' ,'AS_STATES')
            ->select('2','AS_PERIODICITA')
            ->type('test@karoly.com' ,'AS_EMAIL')
            ->type('333333333' ,'AS_PHONE')
            ->type('http://www.test.test' ,'AS_WWW')
            ->select('1', 'ANA_PRIMA_VISITA')
            ->attach('/home/httpd/VeronaFiere/hub/tests/example.pdf','ANA_FILENAME1')
            ->check('ANA_CONSENSO')
            ->type('TEST TEST TEST' ,'AS_COMUNICAZIONI')
            ->press('submit')
            ->seePageIs('/it/press-accreditation/register/giornalista/VIR14');
    }

    /**
     * successful request
     *
     * @return void
     */
    public function testRightForm(){
        echo $this->baseUrl;
        $this->visit('/it/press-accreditation/register/giornalista/VIR14');
        $this
            ->see('Registrazione')
            ->dontSee('Thank you')
            ->type('test', 'ANA_NOME')
            ->type('test', 'ANA_COGNOME')
            ->type('1', 'AS_TESSERA')
            ->type('test@karoly.com', 'ANA_EMAIL')
            ->type('347532265', 'ANA_CELLULARE')
            ->select('2681', 'SOC_ID')
            ->select('1','UTY_ID')
            ->type('sabau', 'ANA_TWITTER_ACCOUNT')
            ->type('TEST' ,'AS_NOME_TESTATA')
            ->type('TEST' ,'AS_ADDRESS')
            ->type('TEST' ,'AS_CITY')
            ->type('33333' ,'AS_CAP')
            ->select('AG' ,'AS_COUNTRY')
            ->select('IT' ,'AS_STATES')
            ->select('2','AS_PERIODICITA')
            ->type('test@karoly.com' ,'AS_EMAIL')
            ->type('333333333' ,'AS_PHONE')
            ->type('http://www.test.test' ,'AS_WWW')
            ->select('1', 'ANA_PRIMA_VISITA')
            ->attach('/home/httpd/VeronaFiere/hub/tests/example.pdf','ANA_FILENAME1')
            ->check('ANA_CONSENSO')
            ->type('TEST TEST TEST' ,'AS_COMUNICAZIONI')
            ->type('3' ,'human')
            ->type('0','IS_OTHER')
            ->press('submit')
            ->seePageIs('/thanks');
    }
}
