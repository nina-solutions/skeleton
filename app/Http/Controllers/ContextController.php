<?php

namespace FairHub\Http\Controllers;

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

        if ($request->has('h-search-text')) {
            $contexts->descNameLike($request->input('h-search-text'));
        }

        if ($request->has('type') && $request->input('type') == 'json') {
            return response()->json($contexts->get());
        }
        return response()->view('admin.contexts.index',[
            'data' => $contexts->paginate(),
            'table' => (object) [
                'name' => 'contexts',
                'columns' => [
                    'name' => 'Nome',
                    'description' => 'Descrizione',
                    'code' => 'Codice',
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
        $contexts = Context::all()->pluck('name', 'id');
        return response()->view('admin.contexts.form',[
            'context' => new Context(),
            'contexts' => $contexts,
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
        $contexts = new Context($request->all());
        if (!$contexts->save()){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
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
        $context = Context::findOrNew($id);
        return response()->json($context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $context = Context::findOrNew($id);
        $contexts = Context::where('id' , '!=', $id)->get()->pluck('name', 'id');
        return response()->view('admin.contexts.form',[
            'context' => $context,
            'contexts' => $contexts,
            'id' => $id,
            'title' => $context->name
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
        $context = Context::findOrNew($id);
        if (!$context->update($request->all(), $id)){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
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
        //
    }
}
