@extends('layouts.app')

@section('content')
    @if (Auth::check())

        <h2>予約一覧</h2>
        @if (count($reservations) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>会議室名</th>
                        <th>日時</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->room->name }}</td>
                        <td>{{ $reservation->time }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h5>予約なし</h5>
        @endif

        <h2>新規予約</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>会議室</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->name }}</td>
                        <td>{!! link_to_route('reservations.show', '時間選択へ', ['reservation' => $room->id], ['class' => 'btn btn-primary']) !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>会議室予約サイト</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection