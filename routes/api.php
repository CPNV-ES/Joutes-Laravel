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
Route::get('{event_id}/tournaments', function ($event_id){
    header('Access-Control-Allow-Origin: *');
    switch($event_id) {
        default:
            return response()->json([
                'tournaments' => [
                    ['id' => 1, 'name' => 'Tounroi Unihockey', 'sport' => 'Unihockey', 'place' => 'Salle de gym'],
                    ['id' => 2, 'name' => 'Tournoi Basket', 'sport' => 'Basketball', 'place' => 'Salle de gym'],
                    ['id' => 3, 'name' => 'Tournoi Volley', 'sport' => 'Volley', 'place' => 'Piscine']
                ]
            ]);
    }
});

//Route for a define tournament
Route::get('{event_id}/tournament/{tournament_id}', function ($event_id, $tournament_id) {
    header('Access-Control-Allow-Origin: *');
    switch($tournament_id) {
        case 1 :
            return response()->json([
                'id'        => 1,
                'name'      => 'Tounnoi Unihockey',
                'sport'     => 'Unihockey',
                'type'      => 'Poules et éliminations',
                'place'     => 'Salle de gym',
                'winner'    => '',
                'teams' => [
                    ['id' => 1, 'name' => 'MU'],
                    ['id' => 2, 'name' => 'MC'],
                    ['id' => 3, 'name' => 'LI'],
                    ['id' => 4, 'name' => 'TO']
                ],
                'group_matchs'    => [
                    ['id' => 1, 'name' => 'Poney'],
                    ['id' => 2, 'name' => 'Cheval'],
                    ['id' => 3, 'name' => 'Loutre'],
                    ['id' => 4, 'name' => 'Vache'],
                    ['id' => 5, 'name' => 'Elimination']
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
                'teams' => [
                    ['id' => 1, 'name' => 'MU'],
                    ['id' => 2, 'name' => 'MC'],
                    ['id' => 3, 'name' => 'LI'],
                    ['id' => 4, 'name' => 'TO']
                ],
                'group_matchs'    => [
                    ['id' => 1, 'name' => 'Poney'],
                    ['id' => 2, 'name' => 'Cheval'],
                    ['id' => 3, 'name' => 'Loutre'],
                    ['id' => 4, 'name' => 'Vache'],
                    ['id' => 5, 'name' => 'Elimination']
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
                'winner'    => 'MU',
                'teams' => [
                    ['id' => 1,'name' => 'MU'],
                    ['id' => 2,'name' => 'MC'],
                    ['id' => 3,'name' => 'LI'],
                    ['id' => 4,'name' => 'TO']
                ],
                'group_matchs'    => [
                    ['id' => 1, 'name' => 'Poney'],
                    ['id' => 2, 'name' => 'Cheval'],
                    ['id' => 3, 'name' => 'Loutre'],
                    ['id' => 4, 'name' => 'Vache'],
                    ['id' => 5, 'name' => 'Elimination']
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});

//Route for a define pool
Route::get('{event_id}/tournament/{tournament_id}/{group_matchs_id}', function ($event_id, $tournament_id, $group_matchs_id) {
    header('Access-Control-Allow-Origin: *');
    switch($group_matchs_id) {
        case 1 :
            return response()->json([
                'id'        => 1,
                'name'      => 'Poney',
                'type'      => 'Poule',
                'teams' => [
                    ['id' => 1, 'name' => 'MU', 'matchesPlayed' => '3', 'matchesWin' => '2', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 2, 'name' => 'MC', 'matchesPlayed' => '3', 'matchesWin' => '1', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 3, 'name' => 'LI', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => '3', 'goalsAgainst' => '2', 'points' => '2'],
                    ['id' => 4, 'name' => 'TO', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => '2', 'goalsAgainst' => '3', 'points' => '0']
                ],
                'matches' => [
                    ['id' => 1, 'name' => '1', 'status' => 'incoming', 'team1' => 'MU', 'team2' => 'MC', 'start' => '09:00', 'team1Score' => '', 'team2Score' => ''],
                    ['id' => 2, 'name' => '2', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '1'],
                    ['id' => 3, 'name' => '3', 'status' => 'finish', 'team1' => 'MC', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                    ['id' => 4, 'name' => '4', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '2', 'team2Score' => '2'],
                    ['id' => 5, 'name' => '5', 'status' => 'finish', 'team1' => 'LI', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                ]
            ]);
            break;
        case 2 :
            return response()->json([
                'id'        => 2,
                'name'      => 'Cheval',
                'type'      => 'Poule',
                'teams' => [
                    ['id' => 1, 'name' => 'MU', 'matchesPlayed' => '3', 'matchesWin' => '2', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 2, 'name' => 'MC', 'matchesPlayed' => '3', 'matchesWin' => '1', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 3, 'name' => 'LI', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => '3', 'goalsAgainst' => '2', 'points' => '2'],
                    ['id' => 4, 'name' => 'TO', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => '2', 'goalsAgainst' => '3', 'points' => '0']
                ],
                'matches' => [
                    ['id' => 6, 'name' => '6', 'status' => 'incoming', 'team1' => 'MU', 'team2' => 'MC', 'start' => '09:00', 'team1Score' => '', 'team2Score' => ''],
                    ['id' => 7, 'name' => '7', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '1'],
                    ['id' => 8, 'name' => '8', 'status' => 'finish', 'team1' => 'MC', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                    ['id' => 9, 'name' => '9', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '2', 'team2Score' => '2'],
                    ['id' => 10, 'name' => '10', 'status' => 'finish', 'team1' => 'LI', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                ]
            ]);
            break;
        case 3 :
            return response()->json([
                'id'        => 3,
                'name'      => 'Loutre',
                'type'      => 'Poule',
                'teams' => [
                    ['id' => 1, 'name' => 'MU', 'matchesPlayed' => '3', 'matchesWin' => '2', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 2, 'name' => 'MC', 'matchesPlayed' => '3', 'matchesWin' => '1', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 3, 'name' => 'LI', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => '3', 'goalsAgainst' => '2', 'points' => '2'],
                    ['id' => 4, 'name' => 'TO', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => '2', 'goalsAgainst' => '3', 'points' => '0']
                ],
                'matches' => [
                    ['id' => 11, 'name' => '11', 'status' => 'incoming', 'team1' => 'MU', 'team2' => 'MC', 'start' => '09:00', 'team1Score' => '', 'team2Score' => ''],
                    ['id' => 12, 'name' => '12', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '1'],
                    ['id' => 13, 'name' => '13', 'status' => 'finish', 'team1' => 'MC', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                    ['id' => 14, 'name' => '14', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '2', 'team2Score' => '2'],
                    ['id' => 15, 'name' => '15', 'status' => 'finish', 'team1' => 'LI', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                ]
            ]);
            break;
        case 4 :
            return response()->json([
                'id'        => 5,
                'name'      => 'Loutre',
                'type'      => 'Poule',
                'teams' => [
                    ['id' => 1, 'name' => 'MU', 'matchesPlayed' => '3', 'matchesWin' => '2', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 2, 'name' => 'MC', 'matchesPlayed' => '3', 'matchesWin' => '1', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 3, 'name' => 'LI', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '2', 'matchesLost' => '0', 'goalsFor' => '3', 'goalsAgainst' => '2', 'points' => '2'],
                    ['id' => 4, 'name' => 'TO', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => '2', 'goalsAgainst' => '3', 'points' => '0']
                ],
                'matches' => [
                    ['id' => 16, 'name' => '16', 'status' => 'incoming', 'team1' => 'MU', 'team2' => 'MC', 'start' => '09:00', 'team1Score' => '', 'team2Score' => ''],
                    ['id' => 17, 'name' => '17', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '1'],
                    ['id' => 18, 'name' => '18', 'status' => 'finish', 'team1' => 'MC', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                    ['id' => 19, 'name' => '19', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '2', 'team2Score' => '2'],
                    ['id' => 20, 'name' => '20', 'status' => 'finish', 'team1' => 'LI', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                ]
            ]);
            break;
        case 5 :
            return response()->json([
                'id'        => 4,
                'name'      => 'Elimination',
                'type'      => 'Elimination',
                'teams' => [
                    ['id' => 1, 'name' => 'MU', 'matchesPlayed' => '1', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 2, 'name' => 'MC', 'matchesPlayed' => '2', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '1', 'goalsFor' => '2', 'goalsAgainst' => '2', 'points' => '5'],
                    ['id' => 3, 'name' => 'LI', 'matchesPlayed' => '1', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '0', 'goalsFor' => '3', 'goalsAgainst' => '2', 'points' => '2'],
                    ['id' => 4, 'name' => 'TO', 'matchesPlayed' => '2', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '2', 'goalsFor' => '2', 'goalsAgainst' => '3', 'points' => '0']
                ],
                'matches' => [
                    ['id' => 21, 'name' => 'demi-final', 'status' => 'finish', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '3', 'team2Score' => '1'],
                    ['id' => 22, 'name' => 'demi-final', 'status' => 'finish', 'team1' => 'LI', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '1'],
                    ['id' => 23, 'name' => 'petite finale', 'status' => 'finish', 'team1' => 'MC', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '2'],
                    ['id' => 24, 'name' => 'grande finale', 'status' => 'incoming', 'team1' => 'MU', 'team2' => 'LI', 'start' => '12:30', 'team1Score' => '', 'team2Score' => '']
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});

Route::get('{event_id}/teams', function ($event_id){
    header('Access-Control-Allow-Origin: *');
    switch($event_id) {
        default:
            return response()->json([
                'teams' => [
                    ['id' => 1, 'name' => 'MU', 'sport' => 'Unihockey'],
                    ['id' => 2, 'name' => 'MC', 'sport' => 'Basketball'],
                    ['id' => 3, 'name' => 'LI', 'sport' => 'Volley'],
                    ['id' => 4, 'name' => 'TO', 'sport' => 'Football'],
                    ['id' => 5, 'name' => 'BO', 'sport' => 'Football'],
                    ['id' => 6, 'name' => 'CE', 'sport' => 'Football'],
                    ['id' => 7, 'name' => 'LE', 'sport' => 'Football'],
                    ['id' => 8, 'name' => 'PO', 'sport' => 'Football'],
                    ['id' => 9, 'name' => 'NE', 'sport' => 'Football'],
                    ['id' => 10, 'name' => 'RE', 'sport' => 'Football'],
                    ['id' => 11, 'name' => 'BR', 'sport' => 'Football'],
                    ['id' => 12, 'name' => 'AA', 'sport' => 'Football'],
                    ['id' => 13, 'name' => 'JU', 'sport' => 'Football'],
                    ['id' => 14, 'name' => 'WE', 'sport' => 'Football']
                ]
            ]);
    }
});

Route::get('{event_id}/team/{team_id}', function ($event_id, $team_id){
    header('Access-Control-Allow-Origin: *');
    switch($team_id) {
        case 1 :
            return response()->json([
                'id'    => 1,
                'name'  => 'MU',
                'status' => 'Vainqueur',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier'],
                    ['firstname' => 'Théo', 'lastname' => 'Zimmermann'],
                    ['firstname' => 'Sébastion', 'lastname' => 'Martin']
                ],
                'sport'     => 'Football',
                'matches' => [
                    ['id' => 1, 'status' => 'incoming', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'finish', 'team2' => 'LI', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],

                    ['id' => 2, 'status' => 'finish', 'team2' => 'Poney', 'start' => '', 'ownScore' => '12', 'team2Score' => '14', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'finish', 'team2' => 'Les Warriors', 'start' => '', 'ownScore' => '9', 'team2Score' => '3', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'incoming', 'team2' => 'PourquoiPas', 'start' => '16:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'finish', 'team2' => 'Test', 'start' => '', 'ownScore' => '2', 'team2Score' => '5', 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 2:
            return response()->json([
                'id'    => 2,
                'name'  => 'MC',
                'status' => 'Eliminé',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'sport'     => 'Basketball',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MU', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'LI', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 3:
            return response()->json([
                'id'    => 3,
                'name'  => 'LI',
                'status' => 'Participe',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
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
                'sport'     => 'Unihockey',
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'MU', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});