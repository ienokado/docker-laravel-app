@extends('layouts.app')

@section('content')
@if (count($debayashis) > 0)
    <p>{{ $keyword }}</p>
    @foreach ($debayashis as $debayashi)
    <p>{{ $debayashi->artist_name }}</p>
    <p>{{ $debayashi->name }}</p>
    @endforeach
@else
    <p>その芸人さん、知らんわ・・・</p>
@endif
@endsection
