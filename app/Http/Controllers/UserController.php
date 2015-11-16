<?php

namespace FairHub\Http\Controllers;

use FairHub\Models\Context;
use FairHub\Models\Role;
use FairHub\Models\User;
use FairHub\Models\ContextUser;
use Illuminate\Http\Request;
use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //TODO: fix this dirty hack to init the query
        $data = User::where('id', '>=', '1');
        $this->authorize(new User());

        if ($request->has('h-search-text')) {
            $data->orLike(['name', 'email'],$request->input('h-search-text'));
        }
        $data = $data->paginate();

        return view('admin.index',[
            'data' => $data,
            'table' => (object) [
                'controller' => 'UserController',
                'name' => 'users',
                'columns' => [
                    'name' => 'Nome',
                    'email' => 'Email'
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
        $new = new User();
        $this->authorize($new);
        $contexts = Context::all()->pluck('name', 'id');
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.users.form',[
            'user' => $new,
            'title' => trans('admin.contexts.new'),
            'contexts' => $contexts,
            'roles' => $roles,
            'permissions' => array(),
            'table' => (object) [
                'controller' => 'UserController',
                'name' => 'users',
                'columns' => [
                    'name' => 'Nome',
                    'email' => 'Email'
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
        $new = new User($request->all());
        $this->authorize($new);
        if (!$new->save()){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        $new->contexts()->sync($request->get('permission'));
        return redirect()->route('admin.users.index')->with('messages', [trans('messages.success')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = User::findOrNew($id);
        $this->authorize($show);
        return json_encode($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::findOrNew($id);
        $this->authorize($edit);
        $contexts = Context::all()->pluck('name', 'id');
        $permissions = ContextUser::where('user_id', '=', $id)->get()->pluck('role_id', 'context_id');
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.users.form',[
            'user' => $edit,
            'id' => $id,
            'title' => $edit->name,
            'contexts' => $contexts,
            'permissions' => $permissions,
            'roles' => $roles,
            'table' => (object) [
                'controller' => 'UserController',
                'name' => 'users',
                'columns' => [
                    'name' => 'Nome',
                    'email' => 'Email'
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
        $edit = User::findOrNew($id);
        $this->authorize($edit);
        if (!$edit->update($request->all(), $id)){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        $edit->contexts()->sync($request->get('permission'));
        return redirect()->route('admin.users.index')->with('messages', [trans('messages.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kill = User::findOrNew($id);
        $this->authorize($kill);
    }
}
