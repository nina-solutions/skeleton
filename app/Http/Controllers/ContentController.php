<?php

namespace FairHub\Http\Controllers;

use FairHub\Http\Requests\ContentRequest;
use FairHub\Models\Content;
use FairHub\Models\Context;
use FairHub\Models\Status;
use FairHub\Models\StatusTransition;
use Illuminate\Http\Request;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        //TODO: fix this dirty hack to init the query
        $contents = Content::where('id', '>=', '1');

        if ($request->has('h-search-text')) {
            $contents->descNameLike($request->input('h-search-text'));
        }

        if ($request->has('type') && $request->input('type') == 'json') {
            return response()->json($contents->get());
        }
        return response()->view('admin.contents.index',[
            'data' => $contents->paginate(),
            'table' => (object) [
                'name' => 'contents',
                'columns' => [
                    'name' => 'Nome',
                    'statusName' => 'Stato',
                    'parentName' => 'Contenuto padre',
                    'contextName' => 'Contesto'
                ],
                'modifiers' => [
                    'statusName' => 'statusCode'
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
        $contents = Content::all()->pluck('name', 'id');
        $contexts = Context::all()->pluck('name', 'id');
        $content = new Content();
        $statuses = $content->transitions();
        $status = Status::find(1)->first();
        return response()->view('admin.contents.form',[
            'content' => $content,
            'contents' => $contents,
            'contexts' => $contexts,
            'statuses' => $statuses,
            'status' => $status,
            'title' => trans('admin.contents.new')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $content = new Content($request->all());
        if (!$content->save()){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        return redirect()->route('admin.contents.index')->with('messages', [trans('messages.success')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::findOrNew($id);
        return response()->json($content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::findOrNew($id);
        $contents = Content::where('id' , '!=', $id)->get()->pluck('name', 'id');
        $contexts = Context::all()->pluck('name', 'id');
        $statuses = $content->transitions();
        $status = $content->status()->get()->first();
        return response()->view('admin.contents.form',[
            'content' => $content,
            'contents' => $contents,
            'contexts' => $contexts,
            'statuses' => $statuses,
            'status' => $status,
            'id' => $id,
            'title' => $content->name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $content = Content::findOrNew($id);
        if (!$content->update($request->all(), $id)){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        return redirect()->route('admin.contents.index')->with('messages', [trans('messages.success')]);
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
