<?php
declare(strict_types=1);

namespace App\Command;

use Attlaz\Project\Command\AbstractCommand;
use Attlaz\Project\Command\Annotation\Command;
use Attlaz\Project\Command\CommandContext;

/**
 * @Command(task="C55B0E4CB")
 */
class DemoCommand extends AbstractCommand
{
    public function __construct(CommandContext $context)
    {
        parent::__construct($context);
    }

    public function init()
    {
    }

    public function execute()
    {
        /**
         * Read out config values
         */
        $key1 = $this->config->get('someconfig_somesetting_key1');
        $key2 = $this->config->get('someconfig_somesetting_key2', 'int');

        $this->logger->info('Config value for key1: ' . $key1);
        $this->logger->info('Config value for key2: ' . $key2);
        /**
         * Read/Write storage
         */
        $pool1 = $this->cacheManager->getCache('pool1');


        $pool1->set('value1', 'Lorem ipsum');

        $cacheValue1 = $pool1->get('Pool1', 'value1');
        $this->logger->info('Cache value for value1 in pool1: ' . $cacheValue1);


        $cachePoolKeys = $this->cacheManager->getCachePoolKeys();
        $this->logger->info('Cache pools: ' . \implode(', ', $cachePoolKeys));


    }
}
