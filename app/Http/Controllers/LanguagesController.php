<?php

namespace FairHub\Http\Controllers;

use FairHub\Models\Language;
use Illuminate\Http\Request;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //TODO: fix this dirty hack to init the query
        $languages = Language::where('id', '>=', '1');
        $this->authorize(new Language());
        if ($request->has('h-search-text')) {
            $languages->orLike(['description', 'code'],$request->input('h-search-text'));
        }
        return view('admin.index',[
            'data' => $languages->paginate(),
            'table' => (object) [
                'controller' => 'LanguagesController',
                'name' => 'languages',
                'columns' => [
                    'description' => 'Nome',
                    'code' => 'Codice'
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
        $new = new Language();
        $this->authorize($new);
        return view('admin.languages.form',[
            'language' => $new
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new Language($request->all());
        $this->authorize($new);
        if (!$language->save()){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        return redirect()->route('admin.languages.index')->with('messages', [trans('messages.success')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language = Language::findOrNew($id);
        return json_encode($language);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Language::findOrNew($id);
        $this->authorize($edit);
        return view('admin.languages.form',[
            'language' => $edit,
            'id' => $id
        ]);
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
        $edit = Language::findOrNew($id);
        $this->authorize($edit);
        if (!$edit->update($request->all(), $id)){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        return redirect()->route('admin.languages.index')->with('messages', [trans('messages.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        redirect('dashboad');
    }

}
