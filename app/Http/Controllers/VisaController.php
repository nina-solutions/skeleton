<?php

namespace FairHub\Http\Controllers;

use FairHub\Events\VisaSaved;
use FairHub\Models\DW_SOTTOCATEGORIE;
use FairHub\Models\DW_SOTTOINTERESSE;
use FairHub\Models\VISA_TIPOSEDE;
use FairHub\Models\VISA_RICHIESTA;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use FairHub\Http\Requests\VisaRequest;

use Mail;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use FairHub\Models\NAZIONI;
use Collective\Html\FormBuilder;
use Symfony\Component\DomCrawler\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VisaController extends Controller
{

    /**
     * Handle ajax requests
     */
    public function ajax(Request $request, $lang = null, $operation = null)
    {

        switch ($operation) {
            case "embassy":

                $nation = $request->nation;
                if (empty($nation)) {
                    return response('No nation selected',404);
                }

                $embassies = VISA_TIPOSEDE::nation($nation)->get();

                $options = [];
                if (count($embassies) > 0) {
                    foreach($embassies as $embassy) {
                        $options[$embassy->VITS_CODICE] = $embassy->VITS_TIPOSEDE;
                    }
                }

                return view('visa.ajaxembassy', [
                    'fieldName' => "VISA_VITS_CODICE",
                    'embassies' => $options,
                    'default' => $request->default
                ]);

                break;

            default:
                return response('No operation selected',400);
                break;
        }

    }


    /**
     * Displays thank you page
     *
     * @return \Illuminate\Http\Response
     */
    public function thanks()
    {
        return view('visa.thanks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $lang, $type, $code)
    {
        //force language to en
        App::setLocale('en');

        $visaFields = $request->fields;

        $nations_q = NAZIONI::orderBy('naz_descr_naz','asc')->get();
        $nations = [];
        foreach($nations_q as $nation){
            $nations[$nation->id] =$nation->description;
        }
        $visaFields['datiPersonali']['fields']['VISA_NAZIONE']['options'] = $nations;


        $visaNations_q = VISA_TIPOSEDE::orderBy('VITS_NAZIONE_EN','asc')->get();
        $visaNations = [];
        foreach($visaNations_q as $nation){
            $visaNations[$nation->description] = $nation->description;
        }
        $visaFields['consolato']['fields']['VISA_ELENCONAZIONIAMBASCIATE']['options'] = $visaNations;

        //attach fields if or not if Visitatore
        if ($request->type == "VISITATORE") {

            $interessi = DW_SOTTOINTERESSE::visible(true)->type($code, "Visa Information")->get();
            $interessiOptions = [];
            foreach ($interessi as $interest) {
                $interessiOptions[$interest->description] = $interest->description;
            }

            $visaFields['datiPersonali']['fields']['VISA_SETTOREINTERESSE']['options'] = $interessiOptions;

        }

        return view('visa.create', [
            'lang' => $lang,
            'type' => $type,
            'code' => $code,
            'visaFields' => $visaFields
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisaRequest $request, $lang, $type, $code)
    {

        $types = config("visa.types");
        $type = $types[$type];

        //check if passport has been used
        $passportExistent = VISA_RICHIESTA::passportExists($request->VISA_NPASS, $code, $request->VISA_NAZIONE )->count();
        if ($passportExistent > 0) {
            return redirect()->back()->withInput($request->all())->with('message', trans('visa.messages.passport_exists'));
        }

        try {
            DB::transaction(function () use ($request, $type, $code) {


                $input = $request->except('_token','fields','submit','type','VISA_SETTOREINTERESSE_OTHER');

                if (strtolower($input['VISA_SETTOREINTERESSE']) == 'other') {
                    $input['VISA_SETTOREINTERESSE'] = $request->VISA_SETTOREINTERESSE_OTHER;
                }

                $dt = new \DateTime();
                $input['VISA_TIMESC'] = $dt->format('Y-m-d H:i:s');

                $input = array_merge($input,
                    [
                        'VISA_MANIF' => substr($code,0,3),
                        'VISA_ANNO' => '20'.substr($code,3,2),
                        'VISA_ANALISI_IN' => $code,
                        'VISA_TIPORICHIESTA' => $type,
                    ]
                );

                $visa_request = new VISA_RICHIESTA($input);
                $visa_request->save();
                event(new VisaSaved($visa_request, $input));


            });

        } catch (\Exception $e){

            echo $e->getMessage();
            echo $e->getTraceAsString();

            //this should be an event
            Log::error('Exception: '.$e->getMessage());
            Log::error('Exception: '.$e->getTraceAsString());
            return redirect()->back()->withInput($request->except(['human']))->with('message', trans('messages.wrongform'));

        }

        return redirect()->route('visa-thanks',array('lang' => $lang)); //->with('message', trans('visa.messages.success'))

    }

}
