@extends('layouts.app')

@section('content')
@if (count($debayashis) > 0)
    <div class="search-result">
        {{ $keyword }}の<br>
        出囃子は・・・
    </div>

    @foreach ($debayashis as $debayashi)
        <p>{{ $debayashi->artist_name }}</p>
        <p>{{ $debayashi->name }}</p>
    @endforeach
@else
    <div class="notfound">
        <p class="mb-5">その芸人さん、<br>知らんわ…</p>
        <a href="{{ route('top') }}" class="btn w-100 p-3 font-weight-bold return-btn">
            <span>検索に戻る</span>
        </a>
    </div>
@endif
@endsection
