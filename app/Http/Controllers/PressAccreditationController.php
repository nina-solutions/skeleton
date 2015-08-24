<?php

namespace FairHub\Http\Controllers;

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
        return view('press-accreditation.create');
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
