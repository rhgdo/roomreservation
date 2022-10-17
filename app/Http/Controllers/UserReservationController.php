<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserReservationController extends Controller
{
    /**
     * 予約するアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをフォローする
        \Auth::user()->reserved($id);
        // 前のURLへリダイレクトさせる
        return back();
    }



}
