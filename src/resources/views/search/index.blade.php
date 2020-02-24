@extends('layouts.app')

@section('content')
  @if ($debayashi)
      <div class="search-keyword">
          <div class="keyword-header search-result-animation">
            <span class="keyword">{{ $keyword }}</span><br>
            の出囃子は・・・
          </div>
      </div>
      <div class="search-result-card search-result-animation">
        <div class="debayashi-info">
          <div class="debayashi-img">
            @if ($spotifyValue && $spotifyValue['image_url'])
              <img src="{{ $spotifyValue['image_url'] }}" alt="{{ $spotifyValue['name'] }}">
            @elseif ($appleMusicValue && $appleMusicValue['image_url'])
              <img src="{{ $appleMusicValue['image_url'] }}" alt="{{ $appleMusicValue['name'] }}">
            @else
              <div class="alt-desc">
                <p>No Image</p>
              </div>
            @endif
          </div>
          <p class="debayashi-name">{{ $debayashi->name }}</p>
          <p class="artist-name">{{ $debayashi->artist_name }}</p>
        </div>
        <div class="link-area">
          @if ($spotifyValue && $spotifyValue['preview_url'])
            <audio src="{{ $spotifyValue['preview_url'] }}" controls></audio>
          @elseif ($appleMusicValue && $appleMusicValue['preview_url'])
            <audio src="{{ $appleMusicValue['preview_url'] }}" controls></audio>
          @endif
          @if ($appleMusicValue && $appleMusicValue['external_url'])
            <a href="{{ $appleMusicValue['external_url'] }}" id="link-apple-music" class="link-btn" target="_blank">
              <img class="apple-logo" src="{{ asset('images/search/logo-apple-music.svg')}}">
            </a>
          @endif
          @if ($spotifyValue && $spotifyValue['external_url'])
            <a href="{{ $spotifyValue['external_url'] }}" id="link-spotify" class="link-btn" target="_blank">
              <img class="spotify-logo" src="{{ asset('images/search/logo-spotify.svg')}}">
            </a>
          @endif
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
  @else
    <div class="notfound">
        <p>その芸人さん、<br>知らんわ…</p>
        <a href="{{ route('top') }}" class="return-btn">
            <span>検索に戻る</span>
        </a>
    </div>
  @endif
@endsection
