@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'reservations.?']) !!}

    @if (count($reservations) > 0)
        <h2>予約可能時間</h2>
        <div class="form-group">
            <label for="room-id">{{ __('会議室') }}</label>
            <select class="form-control" id="room-id" name="room_id">
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>            
        {!! Form::submit('時間選択に進む', ['class' => "btn btn-primary btn-block"]) !!}
                
    {!! Form::close() !!}

    @else

    <h2>予約可能時間はありません。前の画面に戻って会議室を選択してください。</h2>

        
        {!! Form::submit('戻る', ['class' => "btn btn-primary btn-block"]) !!}
    @endif
        

@endsection