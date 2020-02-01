@extends('layouts.app')

@section('content')
<form action="{{ route('debayashi.search.index') }}" method="post">
    {{ csrf_field() }}
    <!-- <div class="container"> -->
    <div class="main-wrapper">
      <img class="logo-img" src="{{ asset('images/top/logo.svg')}}">
      <p>＼ あの芸人の出囃子を検索しよう ／</p>
      <div class="search-parent">
        <input id="search-keyword" type="search" name="search_keyword" class="search-text" placeholder="コンビ名で検索" required="">
        <div class="search-child">
          <input id="search-button" type="submit" class="search-btn" value="">
        </div>
      </div>
      <!-- <div class="comedian"> -->
        <!-- <img class="serif-img" src="{{ asset('images/serif.svg')}}"> -->
        <!-- <img class="female-img" src="{{ asset('images/female.svg')}}">
        <img class="male-img" src="{{ asset('images/male.svg')}}"> -->
        <!-- <img class="ｍicrophone-img" src="{{ asset('images/ｍicrophone.svg')}}"> -->
    <!-- </div> -->
</form>
@endsection
