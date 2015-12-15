<?php

namespace FairHub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use \Illuminate\Http\Request;
use FairHub\Models\FairEdition;

class VisaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //check if the language is avaiable
        $avaiableLanguages = array('en');
        if (!in_array($request->lang, $avaiableLanguages)) {
            return response('Unauthorized.', 401);
        }
        App::setLocale($request->lang);

        //check if the visa type is valid
        $validTypes = config('visa.types');
        if (!in_array($request->type, array_keys($validTypes))) {
            return response('Unauthorized.', 401);
        }

        //check if visa type is valid
        $fields = config('visa.fields');


        //Dynamic Rules
        $fair = FairEdition::code($request->code)->first();



        //attach rules to Visa fields
        if (isset($fields['datiPersonali']['fields']['VISA_PASSDATASCAD'])) {
            $startDate = new \DateTime($fair->start);
            $startDate = $startDate->format('Y-m-d');

            $fields['datiPersonali']['fields']['VISA_PASSDATASCAD']['rules'][] = 'after:'.$startDate;
        }

        if (isset($fields['datiPersonali']['fields']['VISA_DATANASCITA'])) {
            $date16 = new \DateTime('now');
            $date16->modify('-16 years');
            $date16 = $date16->format('Y-m-d');
            $fields['datiPersonali']['fields']['VISA_DATANASCITA']['rules'][] = 'before:'.$date16;
        }

        //attach fields if or not if Visitatore
        if ($request->type == "visitor") {
            $fields['datiPersonali']['fields'] = array_merge($fields['datiPersonali']['fields'] , config('visa.visitatoreFields') );
        } else {
            $fields['datiPersonali']['fields'] = array_merge($fields['datiPersonali']['fields'] , config('visa.notVisitatoreFields') );
        }

        $request->merge([
            'type' => $validTypes[$request->type],
            'fields' => $fields,
        ]);

        return $next($request);
    }
}
