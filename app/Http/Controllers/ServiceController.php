<?php

namespace FairHub\Http\Controllers;

use Illuminate\Http\Request;

use FairHub\Http\Requests;
use FairHub\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $lang, $faircode, $service, $format = null)
    {
        App::setLocale($lang);
        session(['lang' => App::getLocale()]);
        $contents = config('hub-contents');
        $return = null;
        foreach($contents as $content){
            if(in_array($service, $content['service'])){
                if(class_exists($content['model']) &&
                    method_exists(new $content['model'], 'query') &&
                    is_callable($content['model'] .'::query')) {
                    $model = call_user_func($content['model'] . '::where', 'id', '>=', '1');
                    $return = $model->fairCode($faircode)->get()->load('content');
                    break;
                }
            }
        }
        if($format){
            $format = str_replace('.', '', $format);
            switch ($format){
                case 'xml':
                    return response()->xml($return);
            }
        }
        return response()->json($return);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $lang, $faircode, $service, $id)
    {
        App::setLocale($lang);
        session(['lang' => App::getLocale()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        App::abort(403, 'Unauthorized action.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App::abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        App::abort(403, 'Unauthorized action.');
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
        App::abort(403, 'Unauthorized action.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        App::abort(403, 'Unauthorized action.');
    }
}
