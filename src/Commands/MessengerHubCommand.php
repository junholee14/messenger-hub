<?php

namespace Junholee14\MessengerHub\Commands;

use Illuminate\Console\Command;

class MessengerHubCommand extends Command
{
    public $signature = 'messenger-hub';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
