<?php

namespace FairHub\Http\Controllers;

use FairHub\Models\Category;
use FairHub\Models\Context;
use Illuminate\Http\Request;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;

class ContextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //TODO: fix this dirty hack to init the query
        $contexts = Context::where('id', '>=', '1');
        $this->authorize(new Context());
        if ($request->has('h-search-text')) {
            $contexts->orLike(['name', 'description'], $request->input('h-search-text'));
        }
        if ($request->has('h-search-code')) {
            $contexts->code($request->input('h-search-code'));
        }

        if ($request->has('type') && $request->input('type') == 'json') {
            return response()->json($contexts->get());
        }
        return response()->view('admin.index',[
            'data' => $contexts->paginate(),
            'table' => (object) [
                'name' => 'contexts',
                'controller' => 'ContextController',
                'columns' => [
                    'name' => 'Nome',
                    'description' => 'Descrizione',
                    'fullCode' => 'Codice',
                    'parentName' => 'Contesto'
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
        $this->authorize(new Context());
        $contexts = Context::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        return response()->view('admin.contexts.form',[
            'context' => new Context(),
            'contexts' => $contexts,
            'categories' => $categories,
            'title' => trans('admin.contexts.new')
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
        $new = new Context($request->all());
        $this->authorize($new);
        if (!$new->save()){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        $new->categories()->sync($request->get('categories'));
        return redirect()->route('admin.contexts.index')->with('messages', [trans('messages.success')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Context::findOrNew($id);
        $this->authorize($show);
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Context::findOrNew($id);
        $this->authorize($edit);
        $contexts = Context::where('id' , '!=', $id)->get()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');

        return response()->view('admin.contexts.form',[
            'context' => $edit,
            'contexts' => $contexts,
            'categories' => $categories,
            'id' => $id,
            'title' => $edit->name
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
        $edit = Context::findOrNew($id);
        $this->authorize($edit);
        if (!$edit->update($request->all(), $id)){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        $edit->categories()->sync($request->get('categories'));
        return redirect()->route('admin.contexts.index')->with('messages', [trans('messages.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('admin.contexts.index');
    }
}
