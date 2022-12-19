<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUserAboutSeriesCreated implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(EventsSeriesCreated $event)
    {
        $userList = User::all();
        foreach($userList as $index => $user) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->serieId,
                $event->serieSeasonsQty,
                $event->serieEpisodesPerSeason,
            );

            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when,$email);
        }
    }
}
