<?php

namespace FairHub\Events;

use FairHub\DW_ANAGRAFICHE;
use FairHub\Events\Event;
use FairHub\Http\Requests\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AnagraficaSaved extends Event
{
    use SerializesModels;
    public $ana;
    public $input;

    /**
     * Create a new event instance.
     *
     * @param DW_ANAGRAFICHE $ana
     * @param array $input
     * @param string $code
     */
    public function __construct(DW_ANAGRAFICHE $ana, array $input)
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
