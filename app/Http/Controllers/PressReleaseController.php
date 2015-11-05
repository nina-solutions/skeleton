<?php

namespace FairHub\Http\Controllers;

use FairHub\Models\Language;
use FairHub\Models\tab_categorie;
use FairHub\Models\tab_comunicati;
use FairHub\Models\tab_eventi;
use Illuminate\Http\Request;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;

class PressReleaseController extends Controller
{
    /**
     *
composer require symfony/psr-http-message-bridge
composer require zendframework/zend-diactoros
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('h-search-text'))
            $communications = tab_comunicati::like('com_titolo', $request->input('h-search-text'))->paginate();
        else
            $communications = tab_comunicati::paginate();

        return view('admin.press-release.index',[
                'communications' => $communications
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(tab_comunicati::where('com_id', '=', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comunicato = tab_comunicati::where('com_id', '=', $id)->get();
        $categorie = tab_categorie::all();
        $eventi = tab_eventi::all();
        $languages = Language::all();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}