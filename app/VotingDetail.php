<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VotingDetail extends Model
{
    use SoftDeletes;

    const VOTE_AFFIRMATIVE = 'affirmative';
    const VOTE_NEGATIVE = 'negative';
    const VOTE_ABSTENTION = 'abstention';

    protected $table = 'votings_details';

    protected $fillable = [
        'legislator_id',
        'party_id',
        'region_id',
        'vote',
    ];
}
