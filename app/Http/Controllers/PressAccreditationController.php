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

        $categories = DW_SOTTOCATEGORIE::visible(true)->qualifiche('VIR09', $request->channel)->get();
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
        $qualification = DW_SOTTOCATEGORIE::findOrNew($request->SOC_ID);
        $request->merge([
            'ANA_CANALE' => $request->channel,
            'ANA_ANALISI_IN' => $code,
            'ANA_TIMESC' => date('Y-m-d H:i:s'),
            'AS_INSRETTIME' => date('Y-m-d H:i:s'),
            'ANA_QUALIFICATESTO' => $qualification->description,
            'RMC_MAC_ID' => $qualification->SOC_MAC_ID,
            'RMC_SOC_ID' => $request->SOC_ID,
        ]);
        $fileKeys = [];
        for($i = 1; $i <= 5; $i++){
            $fileKey = 'ANA_FILENAME'.$i;
            $imageKey = 'ANA_IMAGE'.$i;
            //check if I have this image and id is valid
            //TODO validator override: estensioni ammesse 'jpg', 'pdf','doc','docx','tiff','odt','tif'
            //symfony2 mime handler seems working not properly at all
            $valid_extensions = ['jpg', 'pdf','doc','docx','tiff','odt','tif'];

            if($request->hasFile($fileKey) && $request->file($fileKey)->isValid()){
                $file = [
                    'name' => $request->file($fileKey)->getClientOriginalName(),
                    'extension' => $request->file($fileKey)->getClientOriginalExtension()
                ];
                if (!in_array($file['extension'], $valid_extensions)){
                    return redirect()->back()->withInput($request->except(['password','human']))->with('message', trans('messages.wrongextension'));
                }
                $filename = 'file'.$i.'_' . date('YmdHis-').md5($file['name']).'.'.$file['extension'];
                $filepath = storage_path(implode('/', [env('UPLOAD'), $code]));
                $request->file($fileKey)->move($filepath, $filename);
                //this trick is due to some Symfony2 security stuff
                //I cannot override file with text apparently
                $fileKeys[$fileKey] = $filename;
                $request->merge([$imageKey => $this->prepareImage($filepath, $filename)]);
            }
        }
        $input = array_merge(
            $request->except(array_merge(
                array_keys($fileKeys),
                ['human', 'fields', '_token'])),
            $fileKeys);
        try {
            DB::transaction(function () use ($input) {
                $ana = new DW_ANAGRAFICHE($input);
                $ana->save();
                $input = array_merge($input, [
                    'ANA_ID' => $ana->id,
                    'RMC_ANA_ID' => $ana->id,
                ]);
                $ana_te = new DW_ANAGRAFICA_TESTATA($input);
                $cat = new DW_RELANAGCATEG($input);
                $util = new DW_RELANAUTY($input);

                $ana_te->save();
                $cat->save();
                $util->save();
            });
        }catch (\Exception $e){
            return redirect()->back()->withInput($request->except(['password','human']))->with('message', trans('messages.wrongform'));
        }
        return redirect()->route('thanks')->with('message', 'Thanks for contacting us!');
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
