<?php

namespace MostafaBozorgzade\DiskMonitor\Http\Controller;

use MostafaBozorgzade\DiskMonitor\Models\DiskMonitorEntry;

class DiskMetricsController
{


    public function __invoke()
    {

        $entries = DiskMonitorEntry::latest()->get();

        return view('disk-monitor::entries', compact('entries'));

    }
}
