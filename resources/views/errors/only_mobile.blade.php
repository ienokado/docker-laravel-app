@extends('layouts.app')

@section('content')
<div class="error-wrapper">
  <div class="error-message-for-other-sp">
    <p class="error-code">404</p>
    <p>このページは</p>
    <p>スマホからしか見れへん･･･</p>
  </div>
  <div class="error-img-for-other-sp">
    <img class="error-img error-img-question" src="{{ mix('images/error/question.svg') }}">
    <img class="error-img error-img-microphone" src="{{ mix('images/error/microphone.svg') }}">
  </div>
</div>
@endsection
