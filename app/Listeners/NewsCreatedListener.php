<?php

namespace App\Listeners;

use App\Events\NewsCreatedEvent;
use App\Models\News;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewsCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewsCreatedEvent  $event
     * @return void
     */
    public function handle(NewsCreatedEvent $event)
    {
        // News created
        // Or send email to manager etc
        
        // $row = News::find($event->news->id);
        // $row->content = 'updated from event listener';
        // $row->save();
        
    }
}
