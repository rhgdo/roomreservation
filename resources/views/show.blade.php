@extends('layouts.app')

@section('content')



    @if (count($reservabletimes) > 0)
        <h2>予約可能時間</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>時間</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservabletimes as $reservabletime)
                    <tr>
                        <td>{{ $reservabletime->time}}</td>
                        <td>
                            {{-- 予約ボタン --}}
                                {!! Form::open(['route' => ['reservations.store', $reservabletime->id]]) !!}
                                {!! Form::submit('予約', ['class' => "btn btn-primary btn-sm"]) !!}
                                {!! Form::close() !!}
                            
                            {{--{!! link_to_route('reservations.store', '予約', [], ['class' => 'btn btn-primary']) !!}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else

    <h2>予約可能時間はありません。前の画面に戻って会議室を選択してください。</h2>
        <a class="btn btn-primary btn-block" href="{{ route('reservations.index') }}">戻る</a>
    @endif
    

@endsection