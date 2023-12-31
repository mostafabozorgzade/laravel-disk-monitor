<?php

namespace MostafaBozorgzade\DiskMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use MostafaBozorgzade\DiskMonitor\Models\DiskMonitorEntry;

class RecordDiskMetricsCommand extends Command
{
    public $signature = 'disk-monitor:record-metrics';

    public $description = 'Record Metrics of a disk';

    public function handle(): int
    {

        collect(config('disk-monitor.disk_names'))
            ->each(fn (string $diskName) => $this->recordMetrics($diskName));



        $this->comment('All done!');

        return self::SUCCESS;
    }

    protected function recordMetrics(string $diskName): void
    {

        $this->info("Recording metrics for disk ");

        $disk = Storage::disk($diskName);

        $fileCount = count($disk->allFiles());

        DiskMonitorEntry::create([
            'disk_name' => $diskName,
            'file_count' => $fileCount,
        ]);

    }
}
