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

        if ($request->has('h-search-text')) {
            $data->orLike(['name', 'email'],$request->input('h-search-text'));
        }
        return view('admin.users.index',[
            'data' => $data->paginate(),
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contexts = Context::all()->pluck('name', 'id');
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.users.form',[
            'user' => new User(),
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
        $user = new User($request->all());
        if (!$user->save()){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
        $user->permissions()->sync();
        $roles = $request->get('roles');
        foreach ($roles as $role) {
            $permissions = ContextUser::user($user)
                ->where('context_id', '=', $role['context_id'])
                ->where('role_id', '=', $role['role_id'])
                ->get();
        }

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
        return json_encode(User::findOrNew($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrNew($id);
        $contexts = Context::all()->pluck('name', 'id');
        $permissions = ContextUser::where('user_id', '=', $id)->get()->pluck('role_id', 'context_id');
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.users.form',[
            'user' => $user,
            'id' => $id,
            'title' => $user->name,
            'contexts' => $contexts,
            'permissions' => array(),
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
        $user = User::findOrNew($id);
        if (!$user->update($request->all(), $id)){
            return redirect()->back()->withInput()->with('messages', [trans('messages.error')]);
        }
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
        //
    }
}
