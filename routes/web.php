<?php

use App\Events\MessageSent;
use App\Models\ChatMessage;
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

Route::get('/chat/{friend}', function (User $friend) {
    return view('chat', [
        'friend' => $friend
    ]);
})->middleware(['auth'])->name('chat');
Route::get('/messages/{friend}', function (User $friend) {
    return ChatMessage::query()
        ->where(function ($query) use ($friend) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $friend->id);
        })
        ->orWhere(function ($query) use ($friend) {
            $query->where('sender_id', $friend->id)
                ->where('receiver_id', auth()->id());
        })
        ->with(['sender', 'receiver'])
        ->orderBy('id', 'asc')
        ->get();
})->middleware(['auth']);
Route::post('/messages/{friend}', function (User $friend) {
    $message = ChatMessage::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $friend->id,
        'text' => request()->input('message')
    ]);

    broadcast(new MessageSent($message));

    return $message;
});
