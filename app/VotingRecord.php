<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VotingRecord extends Model
{
    use SoftDeletes;

    protected $table = 'votings_records';

    protected $fillable = [
        'voting_id',
        'title',
        'original_id'
    ];
}
