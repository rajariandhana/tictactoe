<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasMany(User::class);
    }
    protected $fillable = [
        'p1x_id',
        'p2o_id',
        'pass',
        'status',
    ];
    public function player1()
    {
        return $this->belongsTo(User::class, 'p1x_id');
    }

    public function player2()
    {
        return $this->belongsTo(User::class, 'p2o_id');
    }
}
