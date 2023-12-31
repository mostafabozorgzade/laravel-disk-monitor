<?php

namespace MostafaBozorgzade\DiskMonitor\Models;

use Illuminate\Database\Eloquent\Model;

class DiskMonitorEntry extends Model
{
    public $guarded = [];

    public $cassts = [
        'file_count' => 'integer',
    ];

    public static function last() : ?self
    {
        return static::orderByDesc('id')->first();
    }

}
