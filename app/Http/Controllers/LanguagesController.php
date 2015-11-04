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
        if ($request->has('hsearch-text'))
            $languages = Language::like('description', $request->input('h-search-text'))->paginate();
        else
            $languages = Language::paginate();

        return view('admin.languages.index',[
            'languages' => $languages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.languages.form',[
            'language' => new Language()
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
        $language = new Language($request->all());
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
        $language = Language::findOrNew($id);
        return view('admin.languages.form',[
            'language' => $language,
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
        $language = Language::findOrNew($id);
        if (!$language->update($request->all(), $id)){
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
