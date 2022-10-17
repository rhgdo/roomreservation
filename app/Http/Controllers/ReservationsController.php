<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Reservation;

class ReservationsController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        $rooms = [];
        $reservations = [];
        if (\Auth::check()) { // 認証済みの場合
            $user = \Auth::user();
            $reservations = $user->reservations()->get();
            $rooms = Room::all();
        }
         
        return view('welcome',compact('rooms', 'reservations'));
    }
    
    /**
     * 会議室を受け取って利用可能時間を返す 
     */
    public function show($id)
    {
        // roomのidでreservationを取得
        $reservabletimes = Reservation::where('room_id', $id)->get();

        return view('show',compact('reservabletimes'));
    }

    public function store($id)
    {
        
        $user = \Auth::user();
        $user->reserved($id);
        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
    
    
}
