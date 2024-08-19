<?php

namespace App\Listeners;

use App\Events\CancelledClass;
use App\Jobs\CancelledClassJob;
use App\Mail\CancelledClass as MailCancelledClass;
use App\Notifications\CancelledClassNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NotifyCancelledClass
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CancelledClass $event): void
    {
        //
       $members =  $event->sceduleClasses->members()->get();
       CancelledClassJob::dispatch($members);
    //    $members->each(function($user)
    //    {
    //        Mail::to($user)->send(new MailCancelledClass);
    //    });
        
    }
}
