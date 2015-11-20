<?php

namespace FairHub\Http\Controllers;

use FairHub\Models\Context;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function welcome()
    {
        return response()->view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function home()
    {
        $user = Auth::user();
        return response()->view('home', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function dashboard(Request $request)
    {
        if ($request->isMethod('post')) {
            $con = $request->user()->contexts();
            foreach($request->acl as $i => $context){
                if($i == 0)
                    $con->wherePivot('context_id', $context);
                else
                    $con->orWherePivot('context_id', $context);
            }
            $request->session()->set('acl', $con->get()->pluck('pivot.role_id', 'pivot.context_id'));
        }
        $contexts = Context::whereIn('id', array_keys($request->user()->contexts()->get()->pluck('pivot.role_id', 'pivot.context_id')->toArray()));
        return response()->view('admin.dashboard',[
            'title' => 'Seleziona contesti sui quali lavorare',
            'selected' => array_keys($request->session()->get('acl')->toArray()),
            'options' => $contexts->get()->pluck('name','id')
        ]);
    }
}
