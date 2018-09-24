<?php
declare(strict_types=1);

namespace App\Listeners;

use App\Events\PublishProcessor;

/**
 * Class MessageSubscriber
 */
class MessageSubscriber
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
     * @param  PublishProcessor  $event
     * @return void
     */
    public function handle(PublishProcessor $event)
    {
        var_dump($event->getInt());
    }
}
