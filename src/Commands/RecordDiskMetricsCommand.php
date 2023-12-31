<?php

namespace MostafaBozorgzade\DiskMonitor\Commands;

use Illuminate\Console\Command;

class RecordDiskMetricsCommand extends Command
{
    public $signature = 'disk_monitor';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
