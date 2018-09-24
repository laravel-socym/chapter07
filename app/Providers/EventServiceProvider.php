<?php
declare(strict_types=1);

namespace App\Providers;

use App\Events\PublishProcessor;
use App\Events\ReviewRegistered;
use App\Listeners\MessageSubscriber;
use App\Listeners\ReviewIndexCreator;
use Illuminate\Events\Dispatcher;
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
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\RegisteredListener',
            'App\Listeners\MessageQueueSubscriber'
        ],
        ReviewRegistered::class => [
            ReviewIndexCreator::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
        /** @var Dispatcher $dispatcher */
        $dispatcher = $this->app['events'];
        $dispatcher->listen(
            PublishProcessor::class,
            MessageSubscriber::class
        );
    }
}
