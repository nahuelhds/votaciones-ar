<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\VotingRecord;

class Voting extends Model
{
    use SoftDeletes;

    const CHAMBER_DEPUTIES = 'deputies';
    const CHAMBER_SENATORS = 'senators';

    const RESULT_AFFIRMATIVE = true;
    const RESULT_NEGATIVE = false;
    const RESULT_DRAW = null;

    protected $dates = ['voted_at'];

    protected $fillable = [
        'chamber',
        'original_id'
    ];

    protected $casts = [
        'result' => 'boolean'
    ];

    public function records()
    {
        return $this->hasMany(VotingRecord::class);
    }

    /**
     * Get all the votes from this voting
     *
     * @param VotingVote $vote
     * @return VotingVote
     */
    public function votes()
    {
        return $this->hasMany(VotingVote::class);
    }
}
