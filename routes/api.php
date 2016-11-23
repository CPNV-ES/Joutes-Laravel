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


Route::get('tournaments', function (){
    return response()->json([
        'tournaments' => [
            ['id' => '1', 'name' => 'Unihockey', 'sport' => 'Unihockey', 'place' => 'Salle de gym'],
            ['id' => '1', 'name' => 'Basketball', 'sport' => 'Basketball', 'place' => 'Salle de gym'],
            ['id' => '1', 'name' => 'Volley', 'sport' => 'Volley', 'place' => 'Piscine']
        ]
    ]);
});

Route::get('tournament/{name}', function ($name) {
    switch($name) {
        case 'Unihockey' :
            return response()->json([
                'id'        => '1',
                'sport'     => 'Unihockey',
                'type'      => 'Poules et éliminations',
                'place'     => 'Salle de gym',
                'participants' => [
                    ['name' => 'MU'],
                    ['name' => 'MC'],
                    ['name' => 'LI'],
                    ['name' => 'TO']
                ],
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team1' => 'MU', 'team2' => 'MC', 'start' => '09:00', 'team1Score' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team1' => 'MC', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '2', 'type' => 'Elimination'],
                    ['id' => 3, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'MC', 'start' => '', 'team1Score' => '2', 'team2Score' => '2', 'type' => 'Poule'],
                    ['id' => 3, 'status' => 'Terminé', 'team1' => 'LI', 'team2' => 'TO', 'start' => '', 'team1Score' => '3', 'team2Score' => '2', 'type' => 'Poule'],
                ],
                'poules' => [
                    '1' => [
                        'name'   => 'Poney',
                        'teams' => [
                            ['name' => 'MU', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2'],
                            ['name' => 'MC', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2']
                        ]
                    ],
                    '2' => [
                        'name'   => 'Poney',
                        'teams' => [
                            ['name' => 'LI', 'matchesPlayed' => '1', 'matchesWin' => '1', 'matchesDraw' => '0', 'matchesLost' => '0', 'goalsFor' => '3', 'goalsAgainst' => '2'],
                            ['name' => 'TO', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '0', 'matchesLost' => '1', 'goalsFor' => '2', 'goalsAgainst' => '3']
                        ]
                    ]
                ]
            ]);
            break;
        case 'Basketball' :
            return response()->json([
                'id'        => '2',
                'sport'     => 'Basketball',
                'type'      => 'Eliminations',
                'place'     => 'Terrain de foot',
                'participants' => [
                    ['name' => 'MU'],
                    ['name' => 'MC'],
                    ['name' => 'LI'],
                    ['name' => 'TO']
                ],
                'matches' => [
                    ['id' => 1, 'status' => 'En cours', 'team1' => 'MU', 'team2' => 'TO', 'start' => '09:00', 'team1Score' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team1' => 'MU', 'team2' => 'LI', 'start' => '', 'team1Score' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                    ['id' => 3, 'status' => 'Terminé', 'team1' => 'MC', 'team2' => 'TO', 'start' => '', 'team1Score' => '2', 'team2Score' => '3', 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 'Volley' :
            return response()->json([
                'id'        => '3',
                'sport'     => 'Volley',
                'type'      => 'Poules et éliminations',
                'place'     => 'Piscine',
                'participants' => [
                    ['name' => 'MU'],
                    ['name' => 'MC'],
                    ['name' => 'LI'],
                    ['name' => 'TO']
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
                    '1' => [
                        'name'   => 'Poney',
                        'teams' => [
                            ['name' => 'MU', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2'],
                            ['name' => 'MC', 'matchesPlayed' => '1', 'matchesWin' => '0', 'matchesDraw' => '1', 'matchesLost' => '0', 'goalsFor' => '2', 'goalsAgainst' => '2']
                        ]
                    ],
                    '2' => [
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

Route::get('teams', function (){
    return response()->json([
        'teams' => [
            ['id' => '1', 'name' => 'MU', 'sport' => 'Unihockey'],
            ['id' => '1', 'name' => 'MC', 'sport' => 'Basketball'],
            ['id' => '1', 'name' => 'LI', 'sport' => 'Volley'],
            ['id' => '1', 'name' => 'TO', 'sport' => 'Football']
        ],
        'participants' => [
            ['id' => '1', 'firstname' => 'Mickael', 'lastname' => 'Lacombe', 'sport' => 'Marche'],
            ['id' => '2', 'firstname' => 'Nolan', 'lastname' => 'Rigo', 'sport' => 'Marche'],
            ['id' => '3', 'firstname' => 'Sebastien', 'lastname' => 'Martin', 'sport' => 'Marche'],
            ['id' => '4', 'firstname' => 'Christophe', 'lastname' => 'Kalman', 'sport' => 'Marche']
        ]
    ]);
});

Route::get('team/{name}', function ($name){
    switch($name) {
        case 'MU' :
            return response()->json([
                'type'  => 'equipe',
                'id'    => '1',
                'name'  => 'MU',
                'status' => 'Vainqueur',
                'participants' => [
                    ['firstname' => 'Quentin', 'lastname' => 'Girard'],
                    ['firstname' => 'Malorie', 'lastname' => 'Genoud'],
                    ['firstname' => 'Stéphane', 'lastname' => 'Martignier']
                ],
                'sport'     => 'Football',
                'matchs' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'LI', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 'MC':
            return response()->json([
                'type'  => 'equipe',
                'id'    => '2',
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
        case 'LI':
            return response()->json([
                'type'  => 'equipe',
                'id'    => '3',
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
        case 'quentin' :
            return response()->json([
                'id'        => '4',
                'type'      => 'personne',
                'firstname' => 'Quentin',
                'lastname'  => 'Girard',
                'sport'     => 'Basketball',
                'team'      => 'Poney',
                'matchs' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'LI', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 'stephane':
            return response()->json([
                'id'        => '5',
                'type'      => 'personne',
                'firstname' => 'Stéphane',
                'lastname'  => 'Martignier',
                'sport'     => 'Unihockey',
                'team'      => 'UCY',
                'matchs' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'LI', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                ]
            ]);
            break;
        case 'malorie':
            return response()->json([
                'id'        => '6',
                'type'      => 'personne',
                'firstname' => 'Malorie',
                'lastname'  => 'Genoud',
                'sport'     => 'Marche',
                'matchs' => [
                    ['id' => 1, 'status' => 'En cours', 'team2' => 'MC', 'start' => '09:00', 'ownScore' => '', 'team2Score' => '', 'type' => 'Elimination'],
                    ['id' => 2, 'status' => 'Terminé', 'team2' => 'LI', 'start' => '', 'ownScore' => '3', 'team2Score' => '1', 'type' => 'Elimination'],
                ]
            ]);
            break;
        default:
            return response()->json([]);
            break;
    }
});