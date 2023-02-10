<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable =['sender_id', 'receiver_id','last_time_massage'];
    

    //relation-ship
    public function massage()
    {
        return $this->hasmany(Massage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}