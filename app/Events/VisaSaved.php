<?php

namespace FairHub\Events;

use FairHub\Models\DW_ANAGRAFICHE;
use FairHub\Events\Event;
use FairHub\Http\Requests\Request;
use FairHub\Models\VISA_RICHIESTA;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class VisaSaved extends Event
{
    use SerializesModels;
    public $ana;
    public $input;

    /**
     * Create a new event instance.
     *
     * @param VISA_RICHIESTA $ana
     * @param array $input
     * @param string $code
     */
    public function __construct(VISA_RICHIESTA $ana, array $input)
    {
        $this->ana = $ana;
        $this->input = $input;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
