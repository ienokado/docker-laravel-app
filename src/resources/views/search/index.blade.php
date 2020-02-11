@extends('layouts.app')

@section('content')
@if ($debayashi)
    <div class="main-wrapper">
      <div class="search-result">
        <div class="result-header">
          <span class="keyword">{{ $keyword }}</span>の<br>
          出囃子は・・・
        </div>
      </div>
      <div class="search-result-card">
        <div class="debayashi-info">
            <div class="debayashi-img"><img src="{{ $spotifyValue['image_url'] }}" alt="{{ $spotifyValue['name'] }}"></div>
            <p class="debayashi-name">{{ $debayashi->name }}</p>
            <p class="artist-name">{{ $debayashi->artist_name }}</p>
        </div>
        <div class="link-area">
            <video controls="" autoplay="" name="media">
                <source src="{{ $spotifyValue['preview_url'] }}" type="audio/mpeg">
            </video>
            <a href="#" id="link-apple-music" class="link-btn">
              <img class="apple-logo" src="{{ asset('images/search/logo-apple-music.svg')}}">
            </a>
            <a href="{{ $spotifyValue['external_url'] }}" id="link-spotify" class="link-btn" target="_blank">
              <img class="spotify-logo" src="{{ asset('images/search/logo-spotify.svg')}}">
            </a>
        </div>
          <div class="share-area">
            <span class="share-item">SHARE ON</span>
            <a class="share-item" href="{{ config('const.sns_share_url.twitter') }}" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="share-item" href="{{ config('const.sns_share_url.facebook') }}" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="share-item" href="{{ config('const.sns_share_url.line') }}" target="_blank">
              <i class="fab fa-line"></i>
            </a>
          </div>

        <a href="{{ route('top') }}" class="return-btn-blue">
          <span>検索に戻る</span>
        </a>
      </div>
    </div>
@else
    <div class="notfound">
        <p class="mb-5">その芸人さん、<br>知らんわ…</p>
        <a href="{{ route('top') }}" class="btn w-100 p-3 font-weight-bold return-btn">
            <span>検索に戻る</span>
        </a>
    </div>
@endif
@endsection
