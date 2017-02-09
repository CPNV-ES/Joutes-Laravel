<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//Get all the events
Route::get('events', function (){
    header('Access-Control-Allow-Origin: *');
    return response()->json([
        'events' => [
            ['id' => 1, 'name' => 'Joutes 2017'],
            ['id' => 2, 'name' => 'Tournoi Noël'],
            ['id' => 3, 'name' => 'Joutes 2016'],
            ['id' => 4, 'name' => 'La baston des profs'],
            ['id' => 5, 'name' => 'Duel de classes'],
        ]
    ]);
});


//Get all the tournaments
Route::get('events/{event_id}/tournaments', function ($event_id){
    header('Access-Control-Allow-Origin: *');
    switch($event_id) {
        default:
            return response()->json([
                'tournaments' => [
                    [
                        'id' => 1,
                        'name' => 'Tournoi Unihockey',
                        'sport' => 'Unihockey',
                        'place' => 'Salle de gym',
                        'winner' => ['id' => '', 'name' => ''],
                        'second' => ['id' => '', 'name' => ''],
                        'third' => ['id' => '', 'name' => '']
                    ],
                    [
                        'id' => 2,
                        'name' => 'Tournoi Basket',
                        'sport' => 'Basketball',
                        'place' => 'Salle de gym',
                        'winner' => ['id' => 1, 'name' => 'Manchester United'],
                        'second' => ['id' => 2, 'name' => 'Manchester City'],
                        'third' => ['id' => 4, 'name' => 'Tottenham']
                    ],
                    [
                        'id' => 3,
                        'name' => 'Tournoi Volley',
                        'sport' => 'Volley',
                        'place' => 'Piscine',
                        'winner' => ['id' => '', 'name' => ''],
                        'second' => ['id' => '', 'name' => ''],
                        'third' => ['id' => 5, 'name' => 'Liverpool']
                    ]
                ]
            ]);
    }
});

//Route for a define tournament
Route::get('events/{event_id}/tournament/{tournament_id}', function ($event_id, $tournament_id) {
    header('Access-Control-Allow-Origin: *');
    switch($tournament_id) {
        case 1 :
            return response()->json([
                'id'        => 1,
                'name'      => 'Tournoi Unihockey',
                'sport'     => 'Unihockey',
                'type'      => 'Poules et éliminations',
                'place'     => 'Salle de gym',
                'winner'    => '',
                'second'    => '',
                'third'     => '',
                'teams' => [
                    ['id' => 1, 'name' => 'Manchester United'],
                    ['id' => 2, 'name' => 'Manchester City'],
                    ['id' => 3, 'name' => 'Liverpool'],
                    ['id' => 4, 'name' => 'Tottenham']
                ],
                'group_matchs'    => [
                    ['id' => 1, 'name' => 'Poney', 'totalMatchs' => 6, 'playedMatchs' => 6],
                    ['id' => 2, 'name' => 'Cheval', 'totalMatchs' => 6, 'playedMatchs' => 6],
                    ['id' => 3, 'name' => 'Loutre', 'totalMatchs' => 6, 'playedMatchs' => 6],
                    ['id' => 4, 'name' => 'Vache', 'totalMatchs' => 6, 'playedMatchs' => 6],
                    ['id' => 5, 'name' => 'Elimination', 'totalMatchs' => 4, 'playedMatchs' => 4]
                ]
            ]);
            break;
        case 2 :
            return response()->json([
                'id'        => 2,
                'name'      => 'Tournoi Basket',
                'sport'     => 'Basketball',
                'type'      => 'Eliminations',
                'place'     => 'Terrain de foot',
                'winner'    => '',
                'second'    => '',
                'third'     => 'Liverpool',
                'teams' => [
                    ['id' => 1, 'name' => 'Manchester United'],
                    ['id' => 2, 'name' => 'Manchester City'],
                    ['id' => 3, 'name' => 'Liverpool'],
                    ['id' => 4, 'name' => 'Tottenham']
                ],
                'group_matchs'    => [
                    ['id' => 1, 'name' => 'Poney', 'totalMatchs' => 6, 'playedMatchs' => 4],
                    ['id' => 2, 'name' => 'Cheval', 'totalMatchs' => 6, 'playedMatchs' => 3],
                    ['id' => 3, 'name' => 'Loutre', 'totalMatchs' => 6, 'playedMatchs' => 3],
                    ['id' => 4, 'name' => 'Vache', 'totalMatchs' => 6, 'playedMatchs' => 5],
                    ['id' => 5, 'name' => 'Elimination', 'totalMatchs' => 4, 'playedMatchs' => 0]
                ]
            ]);
            break;
        case 3 :
            return response()->json([
                'id'        => 3,
                'name'      => 'Tournoi Volley',
                'sport'     => 'Volley',
                'type'      => 'Poules et éliminations',
                'place'     => 'Piscine',
                'winner'    => 'Manchester United',
                'second'    => 'Manchester City',
                'third'     => 'Tottenham',
                'teams' => [
                    ['id' => 1,'name' => 'Manchester United'],
                    ['id' => 2,'name' => 'Manchester City'],
                    ['id' => 3,'name' => 'Liverpool'],
                    ['id' => 4,'name' => 'Tottenham']
                ],
                'group_matchs'    => [
                    ['id' => 1, 'name' => 'Poney', 'totalMatchs' => 6, 'playedMatchs' => 6],
                    ['id' => 2, 'name' => 'Cheval', 'totalMatchs' => 6, 'playedMatchs' => 6],
                    ['id' => 3, 'name' => 'Loutre', 'totalMatchs' => 6, 'playedMatchs' => 6],
                    ['id' => 4, 'name' => 'Vache', 'totalMatchs' => 6, 'playedMatchs' => 6],
                    ['id' => 5, 'name' => 'Elimination', 'totalMatchs' => 4, 'playedMatchs' => 2]
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});

//Route for a define pool
Route::get('events/{event_id}/tournament/{tournament_id}/{group_matchs_id}', function ($event_id, $tournament_id, $group_matchs_id) {
    header('Access-Control-Allow-Origin: *');
    switch($group_matchs_id) {
        case 1 :
            return response()->json([
                'id'        => 1,
                'name'      => 'Poney',
                'type'      => 'Poule',
                'teams' => [
                    ['id' => 1, 'name' => 'Manchester United', 'matchesPlayed' => '3', 'matchesWin' => '2', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 2, 'name' => 'Manchester City', 'matchesPlayed' => '3', 'matchesWin' => '1', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 3, 'name' => 'Liverpool', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => 3, 'goalsAgainst' => 2, 'points' => '2'],
                    ['id' => 4, 'name' => 'Tottenham', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => 2, 'goalsAgainst' => 3, 'points' => '0']
                ],
                'matches' => [
                    ['id' => 1, 'name' => '1', 'status' => 'A venir',   'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '15:00', 'team1Score' => null,   'team2Score' => null],
                    ['id' => 2, 'name' => '2', 'status' => 'Terminé',   'team1' => 'Manchester United', 'team2' => 'Tottenham', 'start' => '08:00', 'team1Score' => 3,  'team2Score' => 1],
                    ['id' => 3, 'name' => '3', 'status' => 'Terminé',   'team1' => 'Manchester City', 'team2' => 'Liverpool', 'start' => '09:00', 'team1Score' => 3,  'team2Score' => 2],
                    ['id' => 4, 'name' => '4', 'status' => 'Terminé',   'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '10:00', 'team1Score' => 2,  'team2Score' => 2],
                    ['id' => 5, 'name' => '5', 'status' => 'Terminé',   'team1' => 'Liverpool', 'team2' => 'Tottenham', 'start' => '11:00', 'team1Score' => 3,  'team2Score' => 2],
                ]
            ]);
            break;
        case 2 :
            return response()->json([
                'id'        => 2,
                'name'      => 'Cheval',
                'type'      => 'Poule',
                'teams' => [
                    ['id' => 1, 'name' => 'Manchester United', 'matchesPlayed' => '3', 'matchesWin' => '2', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 2, 'name' => 'Manchester City', 'matchesPlayed' => '3', 'matchesWin' => '1', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 3, 'name' => 'Liverpool', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => 3, 'goalsAgainst' => 2, 'points' => '2'],
                    ['id' => 4, 'name' => 'Tottenham', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => 2, 'goalsAgainst' => 3, 'points' => '0']
                ],
                'matches' => [
                    ['id' => 6, 'name' => '6', 'status' => 'A venir', 'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '09:00', 'team1Score' => null, 'team2Score' => null],
                    ['id' => 7, 'name' => '7', 'status' => 'Terminé', 'team1' => 'Manchester United', 'team2' => 'Tottenham', 'start' => '08:00', 'team1Score' => 3, 'team2Score' => 1],
                    ['id' => 8, 'name' => '8', 'status' => 'Terminé', 'team1' => 'Manchester City', 'team2' => 'Liverpool', 'start' => '11:00', 'team1Score' => 3, 'team2Score' => 2],
                    ['id' => 9, 'name' => '9', 'status' => 'Terminé', 'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '10:00', 'team1Score' => 2, 'team2Score' => 2],
                    ['id' => 10, 'name' => '10', 'status' => 'Terminé', 'team1' => 'Liverpool', 'team2' => 'Tottenham', 'start' => '15:00', 'team1Score' => 3, 'team2Score' => 2],
                ]
            ]);
            break;
        case 3 :
            return response()->json([
                'id'        => 3,
                'name'      => 'Loutre',
                'type'      => 'Poule',
                'teams' => [
                    ['id' => 1, 'name' => 'Manchester United', 'matchesPlayed' => '3', 'matchesWin' => '2', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 2, 'name' => 'Manchester City', 'matchesPlayed' => '3', 'matchesWin' => '1', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 3, 'name' => 'Liverpool', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => 3, 'goalsAgainst' => 2, 'points' => '2'],
                    ['id' => 4, 'name' => 'Tottenham', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => 2, 'goalsAgainst' => 3, 'points' => '0']
                ],
                'matches' => [
                    ['id' => 11, 'name' => '11', 'status' => 'A venir', 'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '09:00', 'team1Score' => null, 'team2Score' => null],
                    ['id' => 12, 'name' => '12', 'status' => 'Terminé', 'team1' => 'Manchester United', 'team2' => 'Tottenham', 'start' => '11:00', 'team1Score' => 3, 'team2Score' => 1],
                    ['id' => 13, 'name' => '13', 'status' => 'Terminé', 'team1' => 'Manchester City', 'team2' => 'Liverpool', 'start' => '15:00', 'team1Score' => 3, 'team2Score' => 2],
                    ['id' => 14, 'name' => '14', 'status' => 'Terminé', 'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '16:00', 'team1Score' => 2, 'team2Score' => 2],
                    ['id' => 15, 'name' => '15', 'status' => 'Terminé', 'team1' => 'Liverpool', 'team2' => 'Tottenham', 'start' => '17:30', 'team1Score' => 3, 'team2Score' => 2],
                ]
            ]);
            break;
        case 4 :
            return response()->json([
                'id'        => 5,
                'name'      => 'Loutre',
                'type'      => 'Poule',
                'teams' => [
                    ['id' => 1, 'name' => 'Manchester United', 'matchesPlayed' => '3', 'matchesWin' => '2', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 2, 'name' => 'Manchester City', 'matchesPlayed' => '3', 'matchesWin' => '1', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 3, 'name' => 'Liverpool', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => 3, 'goalsAgainst' => 2, 'points' => '2'],
                    ['id' => 4, 'name' => 'Tottenham', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => 2, 'goalsAgainst' => 3, 'points' => '0']
                ],
                'matches' => [
                    ['id' => 16, 'name' => '16', 'status' => 'A venir', 'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '09:00', 'team1Score' => null, 'team2Score' => null],
                    ['id' => 17, 'name' => '17', 'status' => 'Terminé', 'team1' => 'Manchester United', 'team2' => 'Tottenham', 'start' => '16:00', 'team1Score' => 3, 'team2Score' => 1],
                    ['id' => 18, 'name' => '18', 'status' => 'Terminé', 'team1' => 'Manchester City', 'team2' => 'Liverpool', 'start' => '08:30', 'team1Score' => 3, 'team2Score' => 2],
                    ['id' => 19, 'name' => '19', 'status' => 'Terminé', 'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '09:15', 'team1Score' => 2, 'team2Score' => 2],
                    ['id' => 20, 'name' => '20', 'status' => 'Terminé', 'team1' => 'Liverpool', 'team2' => 'Tottenham', 'start' => '10:00', 'team1Score' => 3, 'team2Score' => 2],
                ]
            ]);
            break;
        case 5 :
            return response()->json([
                'id'        => 4,
                'name'      => 'Elimination',
                'type'      => 'Elimination',
                'teams' => [
                    ['id' => 1, 'name' => 'Manchester United', 'matchesPlayed' => '1', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '0', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 2, 'name' => 'Manchester City', 'matchesPlayed' => '2', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '1', 'goalsFor' => 2, 'goalsAgainst' => 2, 'points' => '5'],
                    ['id' => 3, 'name' => 'Liverpool', 'matchesPlayed' => '1', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '0', 'goalsFor' => 3, 'goalsAgainst' => 2, 'points' => '2'],
                    ['id' => 4, 'name' => 'Tottenham', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => 2, 'goalsAgainst' => 3, 'points' => '0']
                ],
                'matches' => [
                    ['id' => 21, 'name' => 'Demi-finale',   'status' => 'Terminé', 'team1' => 'Manchester United', 'team2' => 'Manchester City', 'start' => '11:00', 'team1Score' => 3, 'team2Score' => 1],
                    ['id' => 22, 'name' => 'Demi-finale',   'status' => 'Terminé', 'team1' => 'Liverpool', 'team2' => 'Tottenham', 'start' => '17:00', 'team1Score' => 3, 'team2Score' => 1],
                    ['id' => 23, 'name' => 'Petite finale', 'status' => 'Terminé', 'team1' => 'Manchester City', 'team2' => 'Tottenham', 'start' => '10:15', 'team1Score' => 3, 'team2Score' => 2],
                    ['id' => 24, 'name' => 'Grande finale', 'status' => 'A venir', 'team1' => 'Manchester United', 'team2' => 'Liverpool', 'start' => '12:30', 'team1Score' => null, 'team2Score' => null]
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});

Route::get('events/{event_id}/teams', function ($event_id){
    header('Access-Control-Allow-Origin: *');
    switch($event_id) {
        default:
            return response()->json([
                'teams' => [
                    ['id' => 1, 'name' => 'Manchester United', 'sport' => 'Unihockey'],
                    ['id' => 2, 'name' => 'Manchester City', 'sport' => 'Basketball'],
                    ['id' => 3, 'name' => 'Liverpool', 'sport' => 'Volley'],
                    ['id' => 4, 'name' => 'Tottenham', 'sport' => 'Football'],
                    ['id' => 5, 'name' => 'Barcleone', 'sport' => 'Football'],
                    ['id' => 6, 'name' => 'Chelsea', 'sport' => 'Football'],
                    ['id' => 7, 'name' => 'Leicecter', 'sport' => 'Football'],
                    ['id' => 8, 'name' => 'Porto', 'sport' => 'Football'],
                    ['id' => 9, 'name' => 'Neuchâtel Xamax', 'sport' => 'Football'],
                    ['id' => 10, 'name' => 'Real de Madrid', 'sport' => 'Football'],
                    ['id' => 11, 'name' => 'Barcelone', 'sport' => 'Football'],
                    ['id' => 12, 'name' => 'Ajaxe Amsterdam', 'sport' => 'Football'],
                    ['id' => 13, 'name' => 'Juventus Turin', 'sport' => 'Football'],
                    ['id' => 14, 'name' => 'Naple', 'sport' => 'Football']
                ]
            ]);
    }
});

Route::get('events/{event_id}/team/{team_id}', function ($event_id, $team_id){
    header('Access-Control-Allow-Origin: *');
    switch($team_id) {
        case 1 :
            return response()->json([
                'id'    => 1,
                'name'  => 'Manchester United',
                'status' => 'Vainqueur',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier'],
                    ['firstname' => 'Théo', 'lastname' => 'Zimmermann'],
                    ['firstname' => 'Sébastion', 'lastname' => 'Martin']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Football',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 1,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 2,'status' => 'Terminé', 'team2' => 'Liverpool', 'start' => '10:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],

                    ['id' => 2, 'group_match_id' => 3,'status' => 'Terminé', 'team2' => 'Poney', 'start' => '10:30', 'ownScore' => 12, 'team2Score' => 14, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 4,'status' => 'Terminé', 'team2' => 'Les Warriors', 'start' => '11:30', 'ownScore' => 9, 'team2Score' => 3, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 5,'status' => 'A venir', 'team2' => 'PourquoiPas', 'start' => '16:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 1,'status' => 'Terminé', 'team2' => 'Test', 'start' => '17:00', 'ownScore' => 2, 'team2Score' => 5, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 2:
            return response()->json([
                'id'    => 2,
                'name'  => 'Manchester City',
                'status' => 'Eliminée',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Basketball',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 4,'status' => 'A venir', 'team2' => 'Manchester United', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 5,'status' => 'Terminé', 'team2' => 'Liverpool', 'start' => '10:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 3:
            return response()->json([
                'id'    => 3,
                'name'  => 'Liverpool',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 3,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 5,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '15:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 4:
            return response()->json([
                'id'    => 4,
                'name'  => 'WE',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Volley',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 2,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 5,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '11:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 5:
            return response()->json([
                'id'    => 5,
                'name'  => 'BO',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Pétanque',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 2,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 4,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '16:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 6:
            return response()->json([
                'id'    => 6,
                'name'  => 'CE',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Marche',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 1,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 2,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '08:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 7:
            return response()->json([
                'id'    => 7,
                'name'  => 'LE',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'AquaPoney',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 1,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 5,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '14:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 8:
            return response()->json([
                'id'    => 8,
                'name'  => 'PO',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 4,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 3,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '13:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 9:
            return response()->json([
                'id'    => 9,
                'name'  => 'NE',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 3,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 5,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '12:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 10:
            return response()->json([
                'id'    => 10,
                'name'  => 'RE',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 1,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 3,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '14:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 11:
            return response()->json([
                'id'    =>  11,
                'name'  => 'BR',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 1,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 2,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '18:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 12:
            return response()->json([
                'id'    =>  12,
                'name'  => 'AA',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 3,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null, 'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 2,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '15:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 13:
            return response()->json([
                'id'    =>  13,
                'name'  => 'JU',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'tournament' => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'type' => 'Poules et éliminations', 'place' => 'Piscine']
                ],
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'group_match_id' => 5,'status' => 'A venir', 'team2' => 'Manchester City', 'start' => '09:00', 'ownScore' => null, 'team2Score' => null,   'type' => 'Elimination'],
                    ['id' => 2, 'group_match_id' => 4,'status' => 'Terminé', 'team2' => 'Manchester United', 'start' => '16:00', 'ownScore' => 3, 'team2Score' => 1, 'type' => 'Elimination'],
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});

//Get all the participants
Route::get('events/{event_id}/participants', function ($event_id){
    header('Access-Control-Allow-Origin: *');
    switch($event_id) {
        default:
            return response()->json([
                'participants' => [
                    ['id' => 1,     'firstname' => 'Malorie',       'lastname' => 'Genoud'],
                    ['id' => 2,     'firstname' => 'Quentin',       'lastname' => 'Girard'],
                    ['id' => 3,     'firstname' => 'Jonathan',      'lastname' => 'Zaehringer'],
                    ['id' => 4,     'firstname' => 'Mickael',       'lastname' => 'Lacombe'],
                    ['id' => 5,     'firstname' => 'Aida',          'lastname' => 'Sejmnenovic'],
                    ['id' => 6,     'firstname' => 'Stéphane',      'lastname' => 'Martignier'],
                    ['id' => 7,     'firstname' => 'Lola',          'lastname' => 'Olivet'],
                    ['id' => 8,     'firstname' => 'Théo',          'lastname' => 'Zimmermann'],
                    ['id' => 9,     'firstname' => 'Sébastien',     'lastname' => 'Martin'],
                    ['id' => 10,    'firstname' => 'Nolan',         'lastname' => 'Rigo'],
                    ['id' => 11,    'firstname' => 'Alain',         'lastname' => 'Pichonnat'],
                    ['id' => 12,    'firstname' => 'Emmanuel',      'lastname' => 'Barchichat'],
                    ['id' => 13,    'firstname' => 'Christophe',    'lastname' => 'Kalman']
                ]
            ]);
    }
});

//Get one participants
Route::get('events/{event_id}/participant/{participant_id}', function ($event_id, $participant_id){
    header('Access-Control-Allow-Origin: *');
    switch($participant_id) {
        case 1:
            return response()->json([
                'id'    => 1,
                'firstname' => 'Malorie',
                'lastname'  => 'Genoud',
                'tournament'    => [
                    ['id' => 3, 'name' => 'Tournoi Volley', 'sport' => 'Volley', 'place' => 'Piscine']
                ],
                'team' => [
                    ['id' => 1, 'name' => 'Manchester United']
                ]
            ]);
            break;
        case 2:
            return response()->json([
                'id'    => 2,
                'firstname' => 'Quentin',
                'lastname'  => 'Girard',
                'tournament'    => [
                    ['id' => 1, 'name' => 'Tournoi Unihockey', 'sport' => 'Unihockey', 'place' => 'Salle de gym']
                ],
                'team' => [
                    ['id' => 1, 'name' => 'Manchester United']
                ]
            ]);
            break;
        case 3:
            return response()->json([
                'id'    => 3,
                'firstname' => 'Jonathan',
                'lastname'  => 'Zaehringer',
                'tournament'    => [
                    ['id' =>43, 'name' => 'Marche', 'sport' => 'Marche', 'place' => 'Sainte-Croix']
                ],
                'team' => [
                ]
            ]);
            break;
        case 4:
            return response()->json([
                'id'    => 4,
                'firstname' => 'Mickael',
                'lastname'  => 'Lacombe',
                'tournament'    => [
                    ['id' => 2, 'name' => 'Tournoi Basket', 'sport' => 'Basketball', 'place' => 'Salle de gym']
                ],
                'team' => [
                    ['id' => 2, 'name' => 'Manchester City']
                ]
            ]);
            break;
        case 5:
            return response()->json([
                'id'    => 5,
                'firstname' => 'Aida',
                'lastname'  => 'Sejmnenovic',
                'tournament'    => [
                    ['id' => 4, 'name' => 'Marche', 'sport' => 'Marche', 'place' => 'Sainte-Croix']
                ],
                'team' => [
                ]
            ]);
            break;
        case 6:
            return response()->json([
                'id'    =>6,
                'firstname' => 'Stéphane',
                'lastname'  => 'Martignier',
                'tournament'    => [
                    ['id' => 3, 'name' => 'Tournoi Unihockey', 'sport' => 'Unihockey', 'place' => 'Salle de gym']
                ],
                'team' => [
                    ['id' => 4, 'name' => 'Liverpool']
                ]
            ]);
            break;
        case 7:
            return response()->json([
                'id'    => 7,
                'firstname' => 'Lola',
                'lastname'  => 'Olivet',
                'tournament'    => [
                    ['id' => 3, 'name' => 'Tournoi Volley', 'sport' => 'Volley', 'place' => 'Piscine']
                ],
                'team' => [
                    ['id' => 2, 'name' => 'Manchester City']
                ]
            ]);
            break;
        case 8:
            return response()->json([
                'id'    => 8,
                'firstname' => 'Théo',
                'lastname'  => 'Zimmermann',
                'tournament'    => [
                    ['id' => 3, 'name' => 'Tournoi Volley', 'sport' => 'Volley', 'place' => 'Piscine']
                ],
                'team' => [
                    ['id' => 2, 'name' => 'Manchester City']
                ]
            ]);
            break;
        case 9:
            return response()->json([
                'id'    => 9,
                'firstname' => 'Sébastien',
                'lastname'  => 'Martin',
                'tournament'    => [
                    ['id' => 3, 'name' => 'Tournoi Volley', 'sport' => 'Volley', 'place' => 'Piscine']
                ],
                'team' => [
                    ['id' => 2, 'name' => 'Manchester City']
                ]
            ]);
            break;
        case 10:
            return response()->json([
                'id'    => 10,
                'firstname' => 'Nolan',
                'lastname'  => 'Rigo',
                'tournament'    => [
                    ['id' => 4, 'name' => 'Marche', 'sport' => 'Marche', 'place' => 'Sainte-Croix']
                ],
                'team' => [
                ]
            ]);
            break;
        case 11:
            return response()->json([
                'id'    => 11,
                'firstname' => 'Alain',
                'lastname'  => 'Pichonnat',
                'tournament'    => [
                    ['id' => 4, 'name' => 'Marche', 'sport' => 'Marche', 'place' => 'Sainte-Croix']
                ],
                'team' => [
                ]
            ]);
            break;
        case 12:
            return response()->json([
                'id'    => 12,
                'firstname' => 'Emannuel',
                'lastname'  => 'Barchichat',
                'tournament'    => [
                    ['id' => 2, 'name' => 'Tournoi Basket', 'sport' => 'Basketball', 'place' => 'Salle de gym']
                ],
                'team' => [
                    ['id' => 3, 'name' => 'Chelsea']
                ]
            ]);
            break;
        case 13:
            return response()->json([
                'id'    => 13,
                'firstname' => 'Christophe',
                'lastname'  => 'Kalman',
                'tournament'    => [
                    ['id' => 2, 'name' => 'Tournoi Basket', 'sport' => 'Basketball', 'place' => 'Salle de gym']
                ],
                'team' => [
                    ['id' => 3, 'name' => 'Chelsea']
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});