<?php

namespace FairHub\Http\Controllers;

use FairHub\DW_ANAGRAFICA_TESTATA;
use FairHub\DW_ANAGRAFICHE;
use FairHub\DW_RELANAGCATEG;
use FairHub\DW_RELANAUTY;
use FairHub\DW_SOTTOCATEGORIE;
use FairHub\DW_UTILITA;
use FairHub\NAZIONI;
use FairHub\DW_PERIODICITA;
use FairHub\PROV;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use FairHub\Http\Requests\PressAccreditationRequest;
use FairHub\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class PressAccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //need authentication
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request, $role, $code)
    {

        $numbers = [(int) substr(mt_rand(),0,2),(int) substr(mt_rand(),0,1)];
        $sum = array_sum($numbers);
        Session::put('captcha_answer', $sum);

        $jobs = DW_UTILITA::type('LAVORO')->get();
        $workfor = [];
        foreach($jobs as $job){
            //we should use only query and not this trick,
            //it is necessary to build a clean structure before give it
            //to the view
            $workfor[$job->id] =$job->description;
        }

        $categories = DW_SOTTOCATEGORIE::visible(true)->qualifiche('VIR09')->get();
        $qualifications = [];
        foreach($categories as $category){
            $qualifications[$category->id] =$category->description;
        }

        $nations_q = NAZIONI::all();
        $nations = [];
        foreach($nations_q as $nation){
            $nations[$nation->id] =$nation->description;
        }

        $prov_q = PROV::all();
        $provences = [];
        foreach($prov_q as $provence){
            $provences[$provence->id] =$provence->description;
        }

        $periods = DW_PERIODICITA::all();
        $schedule = [];
        foreach($periods as $option){
            $schedule[$option->id] =$option->description;
        }

        return view('press-accreditation.create', [
            'workfor' => $workfor,
            'qualifications'=>$qualifications,
            'nations' => $nations,
            'schedule' => $schedule,
            'role' => $role,
            'code' => $code,
            'fields' => $request->fields,
            'captcha' => $numbers,
            'provences' => $provences
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PressAccreditationRequest $request, $role, $code)
    {
        //Setup custon needs for each request
        $request->merge([
            'ANA_CANALE' => $request->channel,
            'ANA_ANALISI_IN' => $code,
            'ANA_TIMESC' => time(),
            'AS_INSRETTIME' => time(),
        ]);
        $fileKeys = [];
        for($i = 1; $i <= 5; $i++){
            $fileKey = 'ANA_FILENAME'.$i;
            $imageKey = 'ANA_IMAGE'.$i;
            //check if I have this image and id is valid
            //TODO validator override: estensioni ammesse 'jpg', 'pdf','doc','docx','tiff','odt','tif'
            if($request->hasFile($fileKey) && $request->file($fileKey)->isValid()){
                $file = [
                    'name' => $request->file($fileKey)->getClientOriginalName(),
                    'extension' => $request->file($fileKey)->getClientOriginalExtension()
                ];
                $filename = 'file'.$i.'_' . date('YmdHis-').md5($file['name']).'.'.$file['extension'];
                $filepath = storage_path(implode('/', [env('UPLOAD'), $code]));
                $request->file($fileKey)->move($filepath, $filename);
                //this trick is due to some Symfony2 security stuff
                //I cannot override file with text apparently
                $fileKeys[$fileKey] = $filename;
                $request->merge([$imageKey => $this->prepareImage($filepath, $filename)]);
            }
        }
        $input = array_merge($request->except(array_merge(array_keys($fileKeys),['human', 'fields'])), $fileKeys);
        DB::transaction(function() use ($input, $role, $code, $request)
        {
            //just take what you can
            $ana = new DW_ANAGRAFICHE($input);
            $ana_te = new DW_ANAGRAFICA_TESTATA($input);
            $cat = new DW_RELANAGCATEG();
            $util = new DW_RELANAUTY();


            //SAVE DW_ANAGRAFICHE, QUALIFICHE is text, COUNTRY is mandatory if STATE = ITALIA, ANA_FILENAME= nome rinominato, ANA_IMAGEX= byte
            //SAVE RELANAGCATEG with QUALIFICHE ID MAC SOC and eventually OTHER as text
            //SAVE RELANAUTY ANA_ID and UTY_ID
            //SAVE DW_ANAGRAFICA_TESTATA WITH ANA_ID from DW_ANAGRAFICHE


            //
        });


        $save = false;
        if (!$save) {
            return redirect()->back()->withInput($request->except(['password','human']))->with('message', trans('messages.wrongform'));
        }

        return \Redirect::route('thanks')
            ->with('message', 'Thanks for contacting us!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //need authentication
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //need authentication
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //need authentication
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //need authentication
    }

    /**
     * @param $filepath string
     * @param $filename string
     * @return string
     */
    private function prepareImage($filepath, $filename){
        $out = 'null';
        $file = $filepath .'/'. $filename;
        $handle = @fopen($file, 'rb');
        if ($handle)
        {
            $content = @fread($handle, filesize($file));
            $content = bin2hex($content);
            @fclose($handle);
            $out = "0x".$content;
        }
        return $out;
    }
}
