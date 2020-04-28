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
            <img id="artwork" src="{{ $debayashi->spotifyInfos->image_url }}" alt="{{ $debayashi->name }}" class="card-artwork-img card-artwork-img-resize-default">
            @elseif ($debayashi->appleMusicInfos)
            <img id="artwork" src="{{ $debayashi->appleMusicInfos->image_url }}" alt="{{ $debayashi->name }}" class="card-artwork-img card-artwork-img-resize-default">
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


@section('javascript')
<script src="{{ asset('/js/functionsLib.js') }}"></script>
<script>
    @if ($debayashi)
    // 検索ヒット時
        @if($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
            window.SearchResult = {};
            SearchResult.controlIcon = document.getElementById('preview-control-icon');
            SearchResult.audio = document.getElementById('music-preview');
        @endif
    @endif

    window.onload = function () {
        @if ($debayashi)
            @if($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
                // アートワークリサイズ
                FunctionsLib.resizeArtwork();
            @endif

            // 高さ調整
            FunctionsLib.adjustHeightSearchResultCard();

            @if($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
                // プレビューエリア生成
                FunctionsLib.createPreviewAreaForSearchResultCard();
            @endif

            // フッター表示
            FunctionsLib.displayFooter('search', 'search-result-card');
        @else
            // フッター表示
            FunctionsLib.displayFooter('search');
        @endif
    }

</script>

@endsection
