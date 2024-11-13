<?php

namespace Iammarjamal\FajerKit\Commands;

use Illuminate\Console\Command;

class FajerKitCommand extends Command
{
    public $signature = 'fajerkit';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
