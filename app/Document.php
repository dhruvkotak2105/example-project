<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Document extends Model
{
    use SoftDeletes;

    protected $dates = ['date'];


    protected $fillable = [
        'name',
        'email',
        'address',
        'date',
        'time'

    ];


    public function setTimeAttribute($value)
    {
        // Assuming $value is in the "H:i:s" format
        $this->attributes['time'] = Carbon::parse($value)->format('H:i:s');
    }

    // Accessor for formatting the time attribute into 12-hour format
    public function getFormattedTimeAttribute()
    {
        // Assuming $this->attributes['time'] is in the "H:i:s" format
        return Carbon::parse($this->attributes['time'])->format('h:i A');
    }
}
