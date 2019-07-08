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
}
