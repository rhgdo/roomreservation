@if (Auth::id() != $user->id)
    @if (Auth::user()->is_reserved($reservation->id))
        {{-- キャンセルボタンのフォーム --}}
            {!! Form::submit('キャンセル', ['class' => "btn btn-danger btn-block"]) !!}

    @else
        {{-- 予約ボタンのフォーム --}}
        {!! Form::open(['route' => ['user.reserved', $user->id]]) !!}
            {!! Form::submit('予約', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif