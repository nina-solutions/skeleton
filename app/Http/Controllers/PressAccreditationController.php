<?php

namespace FairHub\Http\Controllers;

use FairHub\DW_SOTTOCATEGORIE;
use FairHub\DW_UTILITA;
use FairHub\NAZIONI;
use FairHub\DW_PERIODICITA;
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
        $request = Request::capture();
        $inputs = $request->all();
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
            //we should use only query and not this trick,
            //it is necessary to build a clean structure before give it
            //to the view
            $qualifications[$category->id] =$category->description;
        }


        $nations_q = NAZIONI::all();
        $nations = [];
        foreach($nations_q as $nation){
            //we should use only query and not this trick,
            //it is necessary to build a clean structure before give it
            //to the view
            $nations[$nation->id] =$nation->description;
        }


        $periods = DW_PERIODICITA::all();
        $schedule = [];
        foreach($periods as $option){
            //we should use only query and not this trick,
            //it is necessary to build a clean structure before give it
            //to the view
            $schedule[$option->id] =$option->description;
        }

        return view('press-accreditation.create', ['workfor' => $workfor, 'qualifications'=>$qualifications, 'nations' => $nations, 'schedule' => $schedule]);
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
            return redirect('press-register')->withInput($request->except('password'));
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
}
