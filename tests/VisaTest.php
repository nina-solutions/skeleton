<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use FairHub\Models\VISA_RICHIESTA;

class VisaTest extends TestCase
{
    use DatabaseTransactions;
    //use DatabaseMigrations;


    protected $uniqueId;

    /**
     * Is the form render correctly?
     *
     * @return void
     */
    public function testFormVisitorRender()
    {
        $this->visit('/en/visa/register/visitor/MDM15/')
            ->see('Send')
            ->see('Reset')
            ->see('VISA_SETTOREINTERESSE')
            ->dontSee('VISA_PAD')
            ->dontSee('VISA_STAND')
            ->dontSee('Error')
            ->dontSee('Deprecated')
            ->dontSee('Warning');
    }

    /**
     * Is the form render correctly?
     *
     * @return void
     */
    public function testFormExpositorRender()
    {
        $this->visit('/en/visa/register/expositor/MDM15/')
            ->see('Send')
            ->see('Reset')
            ->dontSee('VISA_SETTOREINTERESSE')
            ->see('VISA_PAD')
            ->see('VISA_STAND')
            ->dontSee('Error')
            ->dontSee('Deprecated')
            ->dontSee('Warning');
    }

    /**
     * Is the form render correctly?
     *
     * @return void
     */
    public function testFormCoExpositorRender()
    {
        $this->visit('/en/visa/register/co-expositor/MDM15/')
            ->see('Send')
            ->see('Reset')
            ->dontSee('VISA_SETTOREINTERESSE')
            ->see('VISA_PAD')
            ->see('VISA_STAND')
            ->dontSee('Error')
            ->dontSee('Deprecated')
            ->dontSee('Warning');
    }

    /**
     * Is the form render correctly?
     *
     * @return void
     */
    public function testWrongTypeRender()
    {
        //TODO test on wrong FairCode
//        $response = $this->call('GET', '/en/visa/register/visitor/dfsaf/');
//        $this->assertEquals(401, $response->status());

        $response = $this->call('GET', '/en/visa/register/wrong/MDM15/');
        $this->assertEquals(401, $response->status());
    }


    /**
     * Test the form failing the validations
     */
    public function testWrongForm() {

        //Step1
        $this->visit('/en/visa/register/visitor/MDM15/')
            ->type('', 'VISA_NOME')
            ->type('', 'VISA_COGNOME')
            ->type('', 'VISA_POSIZIONE')
            ->type('', 'VISA_RAGSOC')
            ->type('', 'VISA_UBICAZIONE1')
            ->type('', 'VISA_LOCALITA')
            ->type('', 'VISA_STATO')
            ->type('', 'VISA_CAP')
//            ->select('test', 'VISA_NAZIONE')
            ->type('', 'VISA_TEL')
            ->type('', 'VISA_FAX')
            ->type('test', 'VISA_EMAIL')
            ->type('test', 'VISA_WWW')
            ->type('', 'VISA_NPASS')
            ->type('20-01-2010', 'VISA_PASSDATAEMISSIONE')
            ->type('10/10/2010', 'VISA_PASSDATASCAD')
            ->type('', 'VISA_BACTIVITY')
            ->type('', 'VISA_DAL')
            ->type('', 'VISA_AL')
            ->press('submit')
            ->seePageIs('/en/visa/register/visitor/MDM15/');

        //Step2
        $this->visit('/en/visa/register/visitor/MDM15/')
            ->type('test', 'VISA_NOME')
            ->type('test', 'VISA_COGNOME')
            ->type('test', 'VISA_POSIZIONE')
            ->type('test', 'VISA_RAGSOC')
            ->type('test', 'VISA_UBICAZIONE1')
            ->type('test', 'VISA_LOCALITA')
            ->type('test', 'VISA_STATO')
            ->type('test', 'VISA_CAP')
            ->select('AF', 'VISA_NAZIONE')
            ->type('test', 'VISA_TEL')
            ->type('test', 'VISA_FAX')
            ->type('test', 'VISA_EMAIL')
            ->type('test', 'VISA_WWW')
            ->type('1', 'VISA_NPASS')
            ->type('20-01-2010', 'VISA_PASSDATAEMISSIONE')
            ->type('10/10/2010', 'VISA_PASSDATASCAD')
            ->select('Other', 'VISA_SETTOREINTERESSE')
            ->select('AFGHANISTAN', 'VISA_ELENCONAZIONIAMBASCIATE')
//            ->select('3000100', 'VISA_VITS_CODICE')
            ->type('test', 'VISA_BACTIVITY')
            ->type('10/10/2010', 'VISA_DATANASCITA')
            ->type('10/10/2010', 'VISA_DAL')
            ->type('10/10/2011', 'VISA_AL')
            ->press('submit')

            ->seePageIs('/en/visa/register/visitor/MDM15/')
            ->see('The Title field is required.')
            ->see('The Email must be a valid email address.') //valid email address
            ->see('The Company Website format is invalid.')
            ->see('The Date of issue (dd/mm/yyyy) does not match the format d/m/Y.') //date format
            ->see('The Exp. date (dd/mm/yyyy) must be a date after today.') //date after today
            ->see('The Exp. date (dd/mm/yyyy) must be a date after 2015-09-30.') //date after Fair Start Date
            ->see('The Embassy field is required.') //ajax field required
            ->see('The Place of Birth field is required.')
            ->see('The From (dd/mm/yyyy) must be a date after today.') //date after today
            ->see('The To (dd/mm/yyyy) must be a date after today.') //date after today
            ->see('The Date of Birth (dd/mm/yyyy) must be a date before 199') // The user must be >16
            ->see("The Other field is required when Sector of Interest is Other.")

            ->seePageIs('/en/visa/register/visitor/MDM15/');

        //Step3 With Expositor (
        $this->visit('/en/visa/register/expositor/MDM15/')
            ->select('Mr.', 'VISA_TITOLO')
            ->type('test', 'VISA_NOME')
            ->type('test', 'VISA_COGNOME')
            ->type('test', 'VISA_POSIZIONE')
            ->type('test', 'VISA_RAGSOC')
            ->type('test', 'VISA_UBICAZIONE1')
            ->type('test', 'VISA_LOCALITA')
            ->type('test', 'VISA_STATO')
            ->type('test', 'VISA_CAP')
            ->select('IT', 'VISA_NAZIONE')
            ->type('test', 'VISA_TEL')
            ->type('test', 'VISA_FAX')
            ->type(env('VISA_MAILTO'), 'VISA_EMAIL')
            ->type('http://www.intesys.it', 'VISA_WWW')
            ->type(1, 'VISA_NPASS')
            ->type('20/01/2015', 'VISA_PASSDATAEMISSIONE')
            ->type('10/10/2016', 'VISA_PASSDATASCAD')
//            ->select('Machinery', 'VISA_SETTOREINTERESSE')
            ->select('AFGHANISTAN', 'VISA_ELENCONAZIONIAMBASCIATE')
            ->select('3000100', 'VISA_VITS_CODICE')
            ->type('test', 'VISA_LUOGONASCITA')
            ->type('10/10/1980', 'VISA_DATANASCITA')
//            ->type('test', 'VISA_BACTIVITY')
            ->type('10/10/2016', 'VISA_DAL')
            ->type('10/10/2017', 'VISA_AL')
            ->press('submit')

            ->see("The Hall field is required.")
            ->see("The Stand field is required.")
            ->seePageIs('/en/visa/register/expositor/MDM15/');


        //Step3 With Co-Expositor (
        $this->visit('/en/visa/register/co-expositor/MDM15/')
            ->select('Mr.', 'VISA_TITOLO')
            ->type('test', 'VISA_NOME')
            ->type('test', 'VISA_COGNOME')
            ->type('test', 'VISA_POSIZIONE')
            ->type('test', 'VISA_RAGSOC')
            ->type('test', 'VISA_UBICAZIONE1')
            ->type('test', 'VISA_LOCALITA')
            ->type('test', 'VISA_STATO')
            ->type('test', 'VISA_CAP')
            ->select('IT', 'VISA_NAZIONE')
            ->type('test', 'VISA_TEL')
            ->type('test', 'VISA_FAX')
            ->type(env('VISA_MAILTO'), 'VISA_EMAIL')
            ->type('http://www.intesys.it', 'VISA_WWW')
            ->type(1, 'VISA_NPASS')
            ->type('20/01/2015', 'VISA_PASSDATAEMISSIONE')
            ->type('10/10/2016', 'VISA_PASSDATASCAD')
//            ->select('Machinery', 'VISA_SETTOREINTERESSE')
            ->select('AFGHANISTAN', 'VISA_ELENCONAZIONIAMBASCIATE')
            ->select('3000100', 'VISA_VITS_CODICE')
            ->type('test', 'VISA_LUOGONASCITA')
            ->type('10/10/1980', 'VISA_DATANASCITA')
//            ->type('test', 'VISA_BACTIVITY')
            ->type('10/10/2016', 'VISA_DAL')
            ->type('10/10/2017', 'VISA_AL')
            ->press('submit')

            ->see("The Hall field is required.")
            ->see("The Stand field is required.")
            ->seePageIs('/en/visa/register/co-expositor/MDM15/');
    }

    /**
     * Checking the ajax call for embassies list
     */
    public function testAjaxCall() {

        $response = $this->call('GET', '/en/visa/ajax/embassy?nation=ALBANIA&default=2200100');
        $this->assertEquals(200, $response->status());
        $responseContent = $response->getContent();

        $this->assertContains('<label for="VISA_VITS_CODICE-2200204" class="radio-inline">Consolato - Scutari </label>', $responseContent);
        $this->assertContains('<input required="required" class="radio-inline" id="VISA_VITS_CODICE-2200100" checked="checked" name="VISA_VITS_CODICE" type="radio" value="2200100">', $responseContent);
        $this->assertContains('<label for="VISA_VITS_CODICE-2200303" class="radio-inline">Consolato Generale - Valona </label>', $responseContent);
        $this->assertNotContains('Fatal error', $responseContent);

    }


    /**
     * Test a correct compiled form
     */
    public function testOkFormAndDuplicatePassportNumber() {

        $this->uniqueId = uniqid();

        $this->visit('/en/visa/register/visitor/MDM15/')
            ->select('Mr.', 'VISA_TITOLO')
            ->type('test', 'VISA_NOME')
            ->type('test', 'VISA_COGNOME')
            ->type('test', 'VISA_POSIZIONE')
            ->type('test', 'VISA_RAGSOC')
            ->type('test', 'VISA_UBICAZIONE1')
            ->type('test', 'VISA_LOCALITA')
            ->type('test', 'VISA_STATO')
            ->type('test', 'VISA_CAP')
            ->select('IT', 'VISA_NAZIONE')
            ->type('test', 'VISA_TEL')
            ->type('test', 'VISA_FAX')
            ->type(env('VISA_MAILTO'), 'VISA_EMAIL')
            ->type('http://www.intesys.it', 'VISA_WWW')
            ->type($this->uniqueId, 'VISA_NPASS')
            ->type('20/01/2015', 'VISA_PASSDATAEMISSIONE')
            ->type('10/10/2016', 'VISA_PASSDATASCAD')
            ->select('Machinery', 'VISA_SETTOREINTERESSE')
            ->select('AFGHANISTAN', 'VISA_ELENCONAZIONIAMBASCIATE')
            ->select('3000100', 'VISA_VITS_CODICE')

            ->type('test', 'VISA_LUOGONASCITA')
            ->type('10/10/1980', 'VISA_DATANASCITA')

            ->type('test', 'VISA_BACTIVITY')
            ->type('10/10/2016', 'VISA_DAL')
            ->type('10/10/2017', 'VISA_AL')
            ->press('submit')

            ->seePageIs('/en/visa/thanks/');


        //check for duplicated passport number
        $this->visit('/en/visa/register/visitor/MDM15/')
            ->select('Mr.', 'VISA_TITOLO')
            ->type('test', 'VISA_NOME')
            ->type('test', 'VISA_COGNOME')
            ->type('test', 'VISA_POSIZIONE')
            ->type('test', 'VISA_RAGSOC')
            ->type('test', 'VISA_UBICAZIONE1')
            ->type('test', 'VISA_LOCALITA')
            ->type('test', 'VISA_STATO')
            ->type('test', 'VISA_CAP')
            ->select('IT', 'VISA_NAZIONE')
            ->type('test', 'VISA_TEL')
            ->type('test', 'VISA_FAX')
            ->type(env('VISA_MAILTO'), 'VISA_EMAIL')
            ->type('http://www.intesys.it', 'VISA_WWW')
            ->type($this->uniqueId, 'VISA_NPASS')
            ->type('20/01/2015', 'VISA_PASSDATAEMISSIONE')
            ->type('10/10/2016', 'VISA_PASSDATASCAD')
            ->select('Machinery', 'VISA_SETTOREINTERESSE')
            ->select('AFGHANISTAN', 'VISA_ELENCONAZIONIAMBASCIATE')
            ->select('3000100', 'VISA_VITS_CODICE')

            ->type('test', 'VISA_LUOGONASCITA')
            ->type('10/10/1980', 'VISA_DATANASCITA')

            ->type('test', 'VISA_BACTIVITY')
            ->type('10/10/2016', 'VISA_DAL')
            ->type('10/10/2017', 'VISA_AL')
            ->press('submit')

            ->see('This passport number has already been entered for this country.')
            ->seePageIs('/en/visa/register/visitor/MDM15/');

    }


    /**
     * @group specialchars
     * Test a correct compiled form
     */
    public function testSpecialChars() {


        $passportId = uniqid();

        $this->visit('/en/visa/register/visitor/MDM15/')
            ->select('Mr.', 'VISA_TITOLO')
            ->type('яшедсдфгй', 'VISA_NOME')
            ->type('кльжщпонбц', 'VISA_COGNOME')
            ->type('ωερτψυπ', 'VISA_POSIZIONE')
            ->type('ζχξωβνμ', 'VISA_RAGSOC')
            ->type('κςηγφδσα', 'VISA_UBICAZIONE1')
            ->type('äöüß', 'VISA_LOCALITA')
            ->type('åæâøôê', 'VISA_STATO')
            ->type('test', 'VISA_CAP')
            ->select('IT', 'VISA_NAZIONE')
            ->type('ñü¿', 'VISA_TEL')
            ->type('äåéö', 'VISA_FAX')
            ->type(env('VISA_MAILTO'), 'VISA_EMAIL')
            ->type('http://www.intesys.it', 'VISA_WWW')
            ->type($passportId, 'VISA_NPASS')
            ->type('20/01/2015', 'VISA_PASSDATAEMISSIONE')
            ->type('10/10/2016', 'VISA_PASSDATASCAD')
            ->select('Machinery', 'VISA_SETTOREINTERESSE')
            ->select('AFGHANISTAN', 'VISA_ELENCONAZIONIAMBASCIATE')
            ->select('3000100', 'VISA_VITS_CODICE')

            ->type('âçğîİşöüû', 'VISA_LUOGONASCITA')
            ->type('10/10/1980', 'VISA_DATANASCITA')

            ->type('頧駍 膣 璸瓁穟 怲杶沷
            簨詪槎 䤦ぬば婨婧 櫦鋨褚橣ツ ひと
            दारी जिसकी मुश्किल', 'VISA_BACTIVITY')
            ->type('10/10/2016', 'VISA_DAL')
            ->type('10/10/2017', 'VISA_AL')
            ->press('submit')

            ->seePageIs('/en/visa/thanks/');


        $visaRichiesta = VISA_RICHIESTA::where('VISA_NPASS',$passportId)->first();

        $this->assertEquals('яшедсдфгй',$visaRichiesta->VISA_NOME);
        $this->assertEquals('кльжщпонбц',$visaRichiesta->VISA_COGNOME);
        $this->assertEquals('ωερτψυπ',$visaRichiesta->VISA_POSIZIONE);
        $this->assertEquals('ζχξωβνμ',$visaRichiesta->VISA_RAGSOC);
        $this->assertEquals('κςηγφδσα',$visaRichiesta->VISA_UBICAZIONE1);
        $this->assertEquals('äöüß',$visaRichiesta->VISA_LOCALITA);
        $this->assertEquals('åæâøôê',$visaRichiesta->VISA_STATO);
        $this->assertEquals('ñü¿',$visaRichiesta->VISA_TEL);
        $this->assertEquals('äåéö',$visaRichiesta->VISA_FAX);
        $this->assertEquals('âçğîİşöüû',$visaRichiesta->VISA_LUOGONASCITA);
        $this->assertEquals('頧駍 膣 璸瓁穟 怲杶沷
            簨詪槎 䤦ぬば婨婧 櫦鋨褚橣ツ ひと
            दारी जिसकी मुश्किल',$visaRichiesta->VISA_BACTIVITY);

    }

}
