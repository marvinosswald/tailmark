<?php

namespace Marvinosswald\Tailmark\Commands;

use Illuminate\Console\Command;

class TailmarkCommand extends Command
{
    public $signature = 'tailmark';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
