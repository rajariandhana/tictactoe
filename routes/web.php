<?php

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $games = Game::all();
    // foreach($games as $game){
    //     $game->player1 = User::where('id',$game->p1x)->get();
    //     $game->player2 = User::where('id',$game->p2o)->get();
    // }
    return view('welcome',[
        'games'=>$games,
        // 'users'=>User::all()
    ]);
});
