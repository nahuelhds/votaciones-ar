<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voting extends Model
{
    use SoftDeletes;

    protected $dates = ['voted_at'];

    protected $fillable = [
        'chamber',
        'voted_at',
        'title'
    ];
}
