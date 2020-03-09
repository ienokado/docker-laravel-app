@extends('layouts.app')

@section('content')
<div class="error-wrapper">
    <div>
        <div class="error-message">
            <p></p>
            <img class="img" src="{{ asset('images/error/question.svg')}}">
        </div>
        <div class="microphone">
            <img class="img" src="{{ asset('images/error/microphone.svg')}}">
        </div>
    </div>
</div>
@endsection
