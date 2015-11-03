<?php

namespace FairHub\Http\Controllers;

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
}
