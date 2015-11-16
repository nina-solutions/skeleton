<?php

namespace FairHub\Http\Controllers;

use FairHub\Models\Category;
use Illuminate\Http\Request;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Category::where('id', '>=', '1');

        if ($request->has('h-search-text')) {
            $data->orLike(['name', 'description'],$request->input('h-search-text'));
        }
        return view('admin.categories.index',[
            'data' => $data->paginate(),
            'table' => (object) [
                'controller' => 'CategoriesController',
                'name' => 'categories',
                'columns' => [
                    'name' => 'Nome',
                    'description' => 'Descrizione'
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
        return view('admin.categories.form',[
            'category' => new Category(),
            'title' => trans('admin.categories.new'),
            'table' => (object) [
                'controller' => 'CategoriesController',
                'name' => 'categories',
                'columns' => [
                    'name' => 'Nome',
                    'description' => 'Descrizione'
                ]
            ]
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
        $new = new Category($request->all());
        if (!$new->save()){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        return redirect()->route('admin.categories.index')->with('messages', [trans('messages.success')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(Category::findOrNew($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Category::findOrNew($id);
        return view('admin.categories.form',[
            'category' => $edit,
            'id' => $id,
            'title' => $edit->name,
            'table' => (object) [
                'controller' => 'CategoriesController',
                'name' => 'categories',
                'columns' => [
                    'name' => 'Nome',
                    'description' => 'Descrizione'
                ]
            ]
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
        $edit = Category::findOrNew($id);
        if (!$edit->update($request->all(), $id)){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        return redirect()->route('admin.categories.index')->with('messages', [trans('messages.success')]);
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
