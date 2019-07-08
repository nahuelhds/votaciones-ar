<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('API')->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::prefix('v1')->namespace('v1')->group(function () {
            Route::apiResources([
                'legislators' => 'LegislatorsController',
                'parties' => 'PartiesController',
                'votings' => 'VotingsController',
                'votings/{voting}/votes' => 'VotingsVotesController'
            ]);
        });

        Route::prefix('import/ar')->namespace('Import\AR')->group(function () {
            Route::prefix('deputies')->group(function () {
                Route::post('voting', 'DeputiesController@voting');
                Route::post('voting/{voting}/records', 'DeputiesController@records');
                Route::post('voting/{voting}/votes', 'DeputiesController@votes');
            });

            Route::prefix('senators')->group(function () {
                Route::post('voting', 'SenatorsController@voting');
                Route::post('voting/{voting}/votes', 'SenatorsController@votes');
            });
        });

        Route::prefix('export/ar')->namespace('Export\AR')->group(function () {
            Route::prefix('deputies')->group(function () {
                Route::get('legislators', 'DeputiesController@legislators');
                Route::get('parties', 'DeputiesController@parties');
                Route::get('regions', 'DeputiesController@regions');
                Route::get('votings', 'DeputiesController@votings');
                Route::get('votings_records', 'DeputiesController@votingsRecords');
                Route::get('votings_votes', 'DeputiesController@votingsVotes');
            });
        });
    });
});
