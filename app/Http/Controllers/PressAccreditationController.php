<?php

namespace FairHub\Http\Controllers;

use FairHub\DW_SOTTOCATEGORIE;
use FairHub\DW_UTILITA;
use FairHub\NAZIONI;
use FairHub\DW_PERIODICITA;
use FairHub\PROV;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use FairHub\Http\Requests\PressAccreditationRequest;
use FairHub\Http\Controllers\Controller;

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
    public function create($role, $code)
    {


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
        $params = $request->all();
        $validates = false;

        if (!$validates) {
            return redirect('press-register')->withInput($request->except('password'))->with('message', 'Something wrong');;
        }

        //SAVE DW_ANAGRAFICHE, QUALIFICHE is text, COUNTRY is mandatory if STATE = ITALIA, ANA_FILENAME= nome rinominato, ANA_IMAGEX= byte
        //I file caricati vanno opportunamente rinominati
        //NOME=FILE1_date('YmdHis-').md5(str_replace('.'.ESTENSIONE, '', $file['name'])).'.'.ESTENSIONE )
        //spostati nella cartella "uploaded_files/<codiceFiera>";
        //estensioni ammesse 'jpg', 'pdf','doc','docx','tiff','odt','tif'

        /**
         *  Method for storing images
         *
         *     $out = 'null';
         *    $handle = @fopen($filepath, 'rb');
         *    if ($handle)
         *    {
         *        $content = @fread($handle, filesize($filepath));
         *        $content = bin2hex($content);
         *        @fclose($handle);
         *        $out = "0x".$content;
         *    }
         *    return $out;
         */


        //SAVE RELANAGCATEG with QUALIFICHE ID MAC SOC and eventually OTHER as text

        //SAVE RELANAUTY ANA_ID and UTY_ID

        //SAVE DW_ANAGRAFICA_TESTATA WITH ANA_ID from DW_ANAGRAFICHE

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
}
