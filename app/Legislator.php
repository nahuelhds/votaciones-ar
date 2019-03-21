<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Legislator extends Model
{
    use SoftDeletes;

    const TYPE_DEPUTY = 'deputy';
    const TYPE_SENATOR = 'senator';

    protected $fillable = [
        'name',
        'last_name'
    ];
}
