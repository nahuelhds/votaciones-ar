<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Party extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function legislators()
    {
        return $this->hasMany(Legislator::class);
    }
}
