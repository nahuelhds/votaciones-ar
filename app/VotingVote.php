<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VotingVote extends Model
{
    use SoftDeletes;

    const VOTE_AFFIRMATIVE = 'affirmative';
    const VOTE_NEGATIVE = 'negative';
    const VOTE_ABSTENTION = 'abstention';
    const VOTE_ABSENT = null;

    protected $table = 'votings_votes';

    protected $fillable = [
        'voting_id',
        'legislator_id',
    ];

    public function voting()
    {
        return $this->belongsTo(Voting::class);
    }

    public function legislator()
    {
        return $this->belongsTo(Legislator::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
