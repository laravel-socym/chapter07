<?php
declare(strict_types=1);

namespace App\Listeners;

use App\Events\PublishProcessor;
use Psr\Log\LoggerInterface;

use function get_class;

/**
 * Class MessageSubscriber
 */
class MessageSubscriber
{
    private $logger;

    /**
     * MessageSubscriber constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle the event.
     *
     * @param  PublishProcessor  $event
     * @return void
     */
    public function handle(PublishProcessor $event)
    {
        // var_dump($event->getInt());
        $this->logger->info(get_class($event), [$event->getInt()]);
    }
}
