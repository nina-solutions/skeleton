<?php

namespace FairHub\Listeners;

use FairHub\Events\AnagraficaSaved;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailSubscriptionConfirmation implements ShouldQueue
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
     * @param  AnagraficaSaved  $event
     * @return void
     */
    public function handle(AnagraficaSaved $event)
    {
        Mail::send('press-accreditation.emails.thankyou',
            ['fair' => $event->ana->code, 'fairStart' => date('d-m-Y'), 'fairEnd' => date('d-m-Y')],
            function ($m) use ($event){
                $m->to($event->ana->email, $event->ana->description)
                    ->subject(trans('press.emails.subject', ['fair' => $event->ana->code]))
                    ->from(env('FROM_EMAIL_PRESS'), env('FROM_NAME'));
        });
        Mail::send('press-accreditation.emails.internal',
            ['fields' => array_keys($event->input), 'input' => $event->input],
            function ($m) use ($event) {
                $m->to(env('EMAIL_INTERNAL'), 'Richiesta accredito stampa - '.$event->ana->code)
                    ->subject(trans('press.emails.subject', ['fair' => $event->ana->code]))
                    ->from(env('FROM_EMAIL_INFO'), env('FROM_NAME'));
        });

    }
}
