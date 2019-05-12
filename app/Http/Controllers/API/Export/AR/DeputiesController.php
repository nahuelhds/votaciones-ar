<?php

namespace App\Http\Controllers\API\Export\AR;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Voting;
use App\VotingRecord;
use App\Region;
use App\Party;
use App\Legislator;
use App\VotingVote;

class DeputiesController extends Controller
{

    /**
     * Export legislators
     *
     * @return \Illuminate\Http\Response
     */
    public function legislators()
    {
        return Legislator::all();
    }

    /**
     * Export parties
     *
     * @return \Illuminate\Http\Response
     */
    public function parties()
    {
        return Party::all();
    }

    /**
     * Export regions
     *
     * @return \Illuminate\Http\Response
     */
    public function regions()
    {
        return Region::all();
    }

    /**
     * Export votings
     *
     * @return \Illuminate\Http\Response
     */
    public function votings()
    {
        return Voting::all();
    }

    /**
     * Export votings records
     *
     * @return \Illuminate\Http\Response
     */
    public function votingsRecords()
    {
        return VotingRecord::all();
    }

    /**
     * Export votings votes
     *
     * @return \Illuminate\Http\Response
     */
    public function votingsVotes()
    {
        $lastOffsetFilename = storage_path() . "/votings_votes_offset.txt";
        $offset = trim(file_get_contents($lastOffsetFilename));

        $limit = 50000;

        $votesFilename = storage_path() . "/votings_votes-$offset.json";
        $handler = fopen($votesFilename, 'a');
        $rows = VotingVote::skip($offset)->take($limit)->get();

        fwrite($handler, (string)$rows);
        fclose($handler);
        file_put_contents($lastOffsetFilename, $offset + $limit);

        return ['next_offset' => $offset + $limit];
    }
}
