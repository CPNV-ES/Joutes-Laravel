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
Route::get('{event_id}/tournaments', function (){
    header('Access-Control-Allow-Origin: *');
    return response()->json([
        'tournaments' => [
            ['id' => 1, 'name' => 'Tounroi Unihockey', 'sport' => 'Unihockey', 'place' => 'Salle de gym'],
            ['id' => 2, 'name' => 'Tournoi Basket', 'sport' => 'Basketball', 'place' => 'Salle de gym'],
            ['id' => 3, 'name' => 'Tournoi Volley', 'sport' => 'Volley', 'place' => 'Piscine']
        ]
    ]);
});

//Route for a define tournament
Route::get('{event_id}/tournament/{tournament_id}', function ($event_id, $tournament_id) {
    header('Access-Control-Allow-Origin: *');
    switch($tournament_id) {
        case 1 :
            return response()->json([
                'id'        => 1,
                'name'      => 'Tournoi Unihockey',
                'sport'     => 'Unihockey',
                'type'      => 'Poules et éliminations',
                'place'     => 'Salle de gym',
                'participants' => [
                    ['id' => 1, 'name' => 'MU'],
                    ['id' => 2, 'name' => 'MC'],
                    ['id' => 3, 'name' => 'LI'],
                    ['id' => 4, 'name' => 'TO']
                ],
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team1' => 'MU', 'team2' => 'MC', 'start' => '09:00', 'team1Score' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team1' => 'MC', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '2', 'type' => 'Elimination'],
                    ['id' => 3, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '2', 'team2Score' => '2', 'type' => 'Poule'],
                    ['id' => 3, 'status' => 'Terminé', 'team1' => 'LI', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '2', 'type' => 'Poule'],
                ],
                'poules' => [
                    [
                        'id'    => 1,
                        'name'   => 'Poney',
                        'teams' => [
                            ['name' => 'MU', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2'],
                            ['name' => 'MC', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2']
                        ],
                    ],
                    [
                        'id'    => 2,
                        'name'   => 'Poney',
                        'teams' => [
                            ['name' => 'LI', 'matchesPlayed' => '1', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '0', 'goalsFor' => '3', 'goalsAgainst' => '2'],
                            ['name' => 'TO', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '1', 'goalsFor' => '2', 'goalsAgainst' => '3']
                        ]
                    ]
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
                'participants' => [
                    ['id' => 1, 'name' => 'MU'],
                    ['id' => 2, 'name' => 'MC'],
                    ['id' => 3, 'name' => 'LI'],
                    ['id' => 4, 'name' => 'TO']
                ],
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team1' => 'MU', 'team2' => 'TO', 'start' => '09:00', 'team1Score' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                    ['id' => 3, 'status' => 'Terminé', 'team1' => 'MC', 'team2' => 'TO', 'start' => '', 'team1Score' => '2', 'team2Score' => '3', 'type' => 'Elimination'],
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
                'participants' => [
                    ['id' => 1,'name' => 'MU'],
                    ['id' => 2,'name' => 'MC'],
                    ['id' => 3,'name' => 'LI'],
                    ['id' => 4,'name' => 'TO']
                ],
                'winner'    => 'MU',
                'matches' => [
                    ['id' => 1, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team1' => 'MC', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '2', 'type' => 'Elimination'],
                    ['id' => 3, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '2', 'team2Score' => '2', 'type' => 'Poule'],
                    ['id' => 3, 'status' => 'Terminé', 'team1' => 'LI', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '2', 'type' => 'Poule'],
                ],
                'poules' => [
                    [
                        'id'    => 1,
                        'name'   => 'Poney',
                        'teams' => [
                            ['name' => 'MU', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2'],
                            ['name' => 'MC', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2']
                        ]
                    ],
                    [
                        'id'    => 2,
                        'name'   => 'Poney',
                        'teams' => [
                            ['name' => 'LI', 'matchesPlayed' => '1', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '0', 'goalsFor' => '3', 'goalsAgainst' => '2'],
                            ['name' => 'TO', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '1', 'goalsFor' => '2', 'goalsAgainst' => '3']
                        ]
                    ]
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});

Route::get('{event_id}/teams', function (){
    header('Access-Control-Allow-Origin: *');
    return response()->json([
        'teams' => [
            ['id' => 1, 'name' => 'MU', 'sport' => 'Unihockey'],
            ['id' => 2, 'name' => 'MC', 'sport' => 'Basketball'],
            ['id' => 3, 'name' => 'LI', 'sport' => 'Volley'],
            ['id' => 4, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 5, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 6, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 7, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 8, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 9, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 10, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 11, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 12, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 13, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 14, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 15, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 16, 'name' => 'TO', 'sport' => 'Football'],
            ['id' => 17, 'name' => 'TO', 'sport' => 'Football'],
        ]
    ]);
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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
                'matchs' => [
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