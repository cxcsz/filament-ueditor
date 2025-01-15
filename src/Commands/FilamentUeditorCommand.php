<?php

namespace Cxcsz\FilamentUeditor\Commands;

use Illuminate\Console\Command;

class FilamentUeditorCommand extends Command
{
    public $signature = 'filament-ueditor';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
