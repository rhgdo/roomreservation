<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * Reservationモデルとの関係を定義
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    /**
     * このroomに紐づくreservation数
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('reservations');
    }
}
