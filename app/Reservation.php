<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['time',  'room_id'];
    
    /**
     * Roomモデルとの関係を定義
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Userモデルとの関係を定義★
     */
    public function reservation_users()
    {
        return $this->belongsToMany(User::class, 'reservation_user', 'reservation_id', 'user_id')->withTimestamps();
    }
}
