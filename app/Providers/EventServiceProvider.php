<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\TweetWasPublished' => [
            'App\Listeners\NotifyMentionedUsers',
            '\App\Listeners\NotifyFollowers'
        ],
        'App\Events\TweetReceivedNewReply' =>[
            'App\Listeners\NotifyMentionedUsers',
            'App\Listeners\NotifyOwner',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
