<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DiscussionCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $discussion;

    public function __construct($discussion)
    {
        $this->discussion = $discussion;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('topics.channel.'. $this->discussion->topic->id);
    }

    public function broadcastWith()
    {
        return [
            'body' => $this->discussion->body,
            'user' => $this->discussion->user,
        ];
    }
}
