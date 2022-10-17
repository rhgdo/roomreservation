<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Reservationモデルとの関係を定義★
     */
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'user_reservation', 'user_id', 'reservation_id')->withTimestamps();
    }
    
    /**
     * $reservationIdで指定された予約を確保する。
     *
     * @param  int  $reservationId
     * @return bool
     */
    public function reserved($reservationId)
    {
        $this->reservations()->attach($reservationId);
        return true;
    }

    
    
    
}
