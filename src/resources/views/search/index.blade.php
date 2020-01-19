@extends('layouts.app')

@section('content')
<p>{{ $keyword }}</p>
@foreach ($debayashis as $debayashi)
<p>{{ $debayashi->artist_name }}</p>
<p>{{ $debayashi->name }}</p>
@endforeach
@endsection
