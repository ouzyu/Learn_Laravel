@if ($random < 50)
    <p>{{ $random }}は50未満です。</p>
@elseif ($random < 70)
    <p>{{ $random }}は50以上70未満です。</p>
@else
    <p>{{ $random }}は50以上です。</p>
@endif