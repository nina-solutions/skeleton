<?php

namespace FairHub\Listeners;

use FairHub\Events\VisaSaved;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class VisaSubscription
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
        //
    }

    /**
     * Handle the event.
     *
     * @param  VisaSaved  $event
     * @return void
     */
    public function handle(VisaSaved $event)
    {

        Mail::send('visa.emails.thankyou',
            ['code' => $event->ana->VISA_ANALISI_IN, 'type' => $event->ana->VISA_TIPORICHIESTA, 'user' => $event->ana->VISA_COGNOME.' '.$event->ana->VISA_NOME ],
            function ($m) use ($event){
                $m->to($event->ana->VISA_EMAIL, $event->ana->VISA_COGNOME.' '.$event->ana->VISA_NOME )
                    ->subject(trans('visa.email.object', ['type' => $event->ana->VISA_TIPORICHIESTA, 'code' => $event->ana->VISA_ANALISI_IN]))
                    ->from(env('VISA_MAILTO'), env('VISA_MAILFROM'));
            });

    }
}
