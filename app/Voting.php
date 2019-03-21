<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\VotingRecord;

class Voting extends Model
{
    use SoftDeletes;

    const RESULT_AFFIRMATIVE = true;
    const RESULT_NEGATIVE = false;
    const RESULT_DRAW = null;

    protected $dates = ['voted_at'];

    protected $fillable = [
        'chamber',
        'voted_at',
        'title'
    ];

    public function records()
    {
        return $this->hasMany(VotingRecord::class);
    }

    public function votes()
    {
        return $this->hasMany(VotingVote::class);
    }
}
