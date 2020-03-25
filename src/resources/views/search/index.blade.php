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
            @if ($debayashi->spotifyInfos)
            <img id="artwork" src="{{ $debayashi->spotifyInfos->image_url }}" alt="{{ $debayashi->name }}">
            @elseif ($debayashi->appleMusicInfos)
            <img id="artwork" src="{{ $debayashi->appleMusicInfos->image_url }}" alt="{{ $debayashi->name }}">
            @else
            <div class="alt-desc">
                <p>No Image</p>
            </div>
            @endif

            @if ($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
            <div id="preview-area">
                <div id="preview-control">
                    <div class="icon-base-circle">
                        <i id="preview-control-icon" class="fas fa-play preview-control-icon"></i>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <p class="debayashi-name">{{ $debayashi->name }}</p>
        <p class="artist-name">{{ $debayashi->artist_name }}</p>
    </div>
    <div class="link-area">
        @if ($debayashi->spotifyInfos && $debayashi->spotifyInfos->preview_url)
        <audio id="music-preview" src="{{ $debayashi->spotifyInfos->preview_url }}"></audio>
        @elseif ($debayashi->appleMusicInfos && $debayashi->appleMusicInfos->preview_url)
        <audio id="music-preview" src="{{ $debayashi->appleMusicInfos->preview_url }}"></audio>
        @endif
        @if ($debayashi->appleMusicInfos)
        <a href="{{ $debayashi->appleMusicInfos->external_url }}" id="link-apple-music" class="link-btn"
           >
            <img class="apple-logo" src="{{ asset('images/search/logo-apple-music.svg')}}">
        </a>
        @endif
        @if ($debayashi->spotifyInfos)
        <a href="{{ $debayashi->spotifyInfos->external_url }}" id="link-spotify" class="link-btn">
            <img class="spotify-logo" src="{{ asset('images/search/logo-spotify.svg')}}">
        </a>
        @endif
    </div>
    <div class="share-area">
        <span class="share-item">SHARE ON</span>
        <a class="share-item" href="{{ config('const.sns_share_url.twitter') }}&text={{ $shareText }}">
            <i class="fab fa-twitter"></i>
        </a>
        <a class="share-item" href="{{ config('const.sns_share_url.facebook') }}">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a class="share-item" href="{{ config('const.sns_share_url.line') }}{{ $shareText }}%20{{ config('app.url') }}">
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
<!-- 検索ヒット時 -->
@section('javascript')
<script>
    @if($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
    const controlIcon = document.getElementById('preview-control-icon');
    const audio = document.getElementById('music-preview');
    @endif

    window.onload = function () {

        @if($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
        // アートワークリサイズ
        var artwork = document.getElementById("artwork");
        var intervalId = setInterval(function () {
            if (artwork.complete) {
                var imgW = artwork.width;
                var imgH = artwork.height;
                if (imgH <= imgW) {
                    artwork.classList.add('size-based-on-width')
                } else if (imgW < imgH) {
                    artwork.classList.add('size-based-on-height')
                }
                clearInterval(intervalId);
            }
        }, 100);
        @endif

        // 高さ調整
        var searchKeyword_h = document.getElementById('search-keyword-area').clientHeight;
        var card_h = document.getElementById('search-result-card').clientHeight;
        if ((searchKeyword_h + card_h) < document.documentElement.clientHeight) {
            document.getElementById('search-result-card').classList.add('ground-on-bottom');
        }

        @if($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
        // プレビューエリア生成
        document.getElementById('preview-control').addEventListener('click', previewClick);
        var preview = document.getElementById('preview-area');
        preview.parentNode.classList.add('preview-area-base');
        @endif
    }

    //プレビューボタンクリック
    function previewClick() {
        if (controlIcon.classList.contains('fa-play')) {
            // 再生
            if (audio.readyState === 4) {
                // 再生可能
                audio.play();
            } else {
                //再生可能でない場合、メディアをロード
                audio.load();
                if (audio.classList.contains('available') !== true) {
                    audio.addEventListener('canplaythrough', () => {
                        audio.play();
                    });
                    audio.classList.add('available');
                }
            }
        } else if (controlIcon.classList.contains('fa-pause')) {
            // 停止
            audio.pause();
        }

        // 初回再生時,自動終了時の処理を設定
        if (audio.classList.contains('played-even-once') !== true) {
            audio.addEventListener('ended', () => {
                previewControlSetting();
            });
            audio.classList.add('played-even-once');
        }
        previewControlSetting();
    }

    // ボタン変更
    function previewControlSetting() {
        if (controlIcon.classList.contains('fa-play')) {
            // 再生→停止ボタン
            controlIcon.classList.remove('fa-play');
            controlIcon.classList.add('fa-pause');
        } else {
            // 停止→再生ボタン
            controlIcon.classList.add('fa-play');
            controlIcon.classList.remove('fa-pause');
        }
    }

</script>
@endsection
@endif
