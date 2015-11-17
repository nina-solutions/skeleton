<?php

namespace FairHub\Http\Controllers;

use FairHub\Models\Category;
use FairHub\Models\Content;
use FairHub\Models\Context;
use FairHub\Models\Language;
use FairHub\Models\PressRelease;
use FairHub\Models\Status;
use FairHub\Models\User;
use Illuminate\Http\Request;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;

class PressReleaseController extends Controller
{
    protected $name = 'press-releases';
    protected $controller = 'PressReleaseController';
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
                'controller' => $this->controller,
                'name' => $this->name,
                'columns' => [
                    'title' => 'Titolo',
                    //'contentName' => 'Nome',
                    //'contextName' => 'Contesto'
                ],
                'actions' => [

                ],
                'modifiers' => [
                    //'statusName' => 'statusCode'
                ]
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $contents = Content::whereIn('context_id', array_keys($request->session()->get('acl')->toArray()))->get()->pluck('name', 'id');
        $contexts = Context::whereIn('id', array_keys($request->session()->get('acl')->toArray()))->get()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $content = new Content();
        $this->authorize($content);
        $model = new PressRelease();
        $model->content = $content;
        $transitions = $content->transitions();
        $statuses = Status::all()->pluck('code', 'id');
        $status = Status::where('id', '=', '1')->first();
        return response()->view("admin.$this->name.form",[
            'model' => $model,
            'contents' => $contents,
            'contexts' => $contexts,
            'categories' => $categories,
            'statuses' => $statuses,
            'transitions' => $transitions,
            'status' => $status,
            'title' => trans("admin.$this->name.new"),
            'table' => (object) [
                'controller' => $this->controller,
                'name' => $this->name,
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
        $new = new PressRelease($request->all());
        $this->authorize($new->content);
        if (!$new->save()){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        $content = new Content($request->get('content'));
        $new->content()->save($content);
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
