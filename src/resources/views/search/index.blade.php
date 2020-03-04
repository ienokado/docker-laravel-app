@extends('layouts.app')

@section('content')
  @if ($debayashi)
      <div class="search-keyword" id="search-keyword-area">
          <div class="keyword-header search-result-animation">
            <span class="keyword">{{ $keyword }}</span><br>
            の出囃子は・・・
          </div>
      </div>
      <div class="search-result-card search-result-animation" id="search-result-card">
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

            @if (($spotifyValue && $spotifyValue['preview_url']) || ($appleMusicValue && $appleMusicValue['preview_url']))
              <div id="preview-area">
                <div id ="preview-control">
                  <i id ="preview-control-icon" class="fas fa-play-circle preview-control-icon"></i>
                </div>
              </div>
            @endif

          </div>
          <p class="debayashi-name">{{ $debayashi->name }}</p>
          <p class="artist-name">{{ $debayashi->artist_name }}</p>
        </div>
        <div class="link-area">
          @if ($spotifyValue && $spotifyValue['preview_url'])
            <audio id="music-preview" src="{{ $spotifyValue['preview_url'] }}"></audio>
          @elseif ($appleMusicValue && $appleMusicValue['preview_url'])
            <audio id="music-preview" src="{{ $appleMusicValue['preview_url'] }}"></audio>
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
            <a class="share-item" href="{{ config('const.sns_share_url.twitter') }}&text={{ $shareText }}" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
          <a class="share-item" href="{{ config('const.sns_share_url.facebook') }}" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a class="share-item" href="{{ config('const.sns_share_url.line') }}{{ $shareText }}" target="_blank">
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

@if ($debayashi)
<!-- 検索ヒット時に高さ調整 -->
  @section('javascript')
    <script>
      window.onload = function(){
        // 検索ヒット時に高さ調整
        var searchKeyword_h = document.getElementById('search-keyword-area').clientHeight;
        var card_h = document.getElementById('search-result-card').clientHeight;
        if ( (searchKeyword_h + card_h) < document.documentElement.clientHeight ) {
          document.getElementById('search-result-card').classList.add('ground-on-bottom');
        }

        // 試聴可能の場合プレビューエリア生成
        @if (($spotifyValue && $spotifyValue['preview_url']) || ($appleMusicValue && $appleMusicValue['preview_url']))
          document.getElementById('preview-control').addEventListener('click', previewClick);
          var prev = document.getElementById('preview-area');
          prev.parentNode.classList.add('preview-area-base');
        @endif
      }

    function previewClick(){
      //プレビューボタンクリック
      var controlIcon = document.getElementById('preview-control-icon');
      var audio = document.getElementById('music-preview');

      if (controlIcon.classList.contains('fa-play-circle')) {
        // 再生
        audio.play();
        controlIcon.classList.remove('fa-play-circle');
        controlIcon.classList.add('fa-pause-circle');
      } else if (controlIcon.classList.contains('fa-pause-circle')) {
        // 停止
        audio.pause();
        controlIcon.classList.add('fa-play-circle');
        controlIcon.classList.remove('fa-pause-circle');
      }
    }
    </script>
  @endsection
@endif