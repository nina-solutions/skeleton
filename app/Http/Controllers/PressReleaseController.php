<?php

namespace FairHub\Http\Controllers;

use FairHub\Models\Content;
use FairHub\Models\Language;
use FairHub\Models\PressRelease;
use FairHub\Models\User;
use Illuminate\Http\Request;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;

class PressReleaseController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //TODO: fix this dirty hack to init the query
        $data = PressRelease::where('id', '>=', '1');
        $this->authorize(new Content());

        if ($request->has('h-search-text')) {
            $data->orLike(['title', 'subhead', 'subtitle'],$request->input('h-search-text'));
        }
        $data = $data->paginate();

        return view('admin.index',[
            'data' => $data,
            'table' => (object) [
                'controller' => 'PressReleaseController',
                'name' => 'press-releases',
                'columns' => [
                    'title' => 'Titolo',
                    'contentName' => 'Nome',
                    //'contextName' => 'Contesto'
                ],
                'actions' => [

                ]
            ]
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


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
