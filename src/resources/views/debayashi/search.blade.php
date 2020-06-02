@extends('layouts.app')

@section('content')
@if ($debayashi)
<div class="search-keyword" >
    <div class="keyword-header search-result-animation">
        <span class="keyword">{{ $keyword }}</span><br>
        の出囃子は・・・
    </div>
</div>
<div class="search-result-card search-result-animation" id="search-result-card">
    <div class="debayashi-info">
        <div class="debayashi-img @if ($debayashi->spotifyInfos || $debayashi->appleMusicInfos)card-preview-area-base @endif">
            @if ($debayashi->spotifyInfos)
                <img src="{{ $debayashi->spotifyInfos->image_url }}" alt="{{ $debayashi->name }}" class="debayashi-img-resize">
            @elseif ($debayashi->appleMusicInfos)
                <img src="{{ $debayashi->appleMusicInfos->image_url }}" alt="{{ $debayashi->name }}" class="debayashi-img-resize">
            @else
                <div class="alt-desc">
                    <p>No Image</p>
                </div>
            @endif

            @if ($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
            <div class="card-preview-area">
                <div class="card-preview-control" data-id="{{ $debayashi->id }}">
                    <div class="card-icon-base-circle">
                        <i class="fas fa-play card-preview-control-icon" data-id="{{ $debayashi->id }}"></i>
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
        <audio src="{{ $debayashi->spotifyInfos->preview_url }}" data-id="{{ $debayashi->id }}"></audio>
        @elseif ($debayashi->appleMusicInfos && $debayashi->appleMusicInfos->preview_url)
        <audio src="{{ $debayashi->appleMusicInfos->preview_url }}" data-id="{{ $debayashi->id }}"></audio>
        @endif
        @if ($debayashi->appleMusicInfos)
        <a href="{{ $debayashi->appleMusicInfos->external_url }}" class="link-btn"
           >
            <img class="apple-logo" src="{{ asset('images/search/logo-apple-music.svg') }}">
        </a>
        @endif
        @if ($debayashi->spotifyInfos)
        <a href="{{ $debayashi->spotifyInfos->external_url }}" class="link-btn">
            <img class="spotify-logo" src="{{ asset('images/search/logo-spotify.svg') }}">
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
<script>
    window.onload = function () {
        @if ($debayashi)
            // 高さ調整
            AdjustStyles.adjustHeightSearchResultCard();

            @if($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
                window.CardItem = {};
                window.CardItem.audios = document.querySelectorAll('audio');
                window.CardItem.icons = document.querySelectorAll('.card-preview-control-icon');
                // プレビューエリア生成
                PlayDebayashis.createPreviewArea();
            @endif

            // フッター表示
            AdjustStyles.displayFooter('search', 'search-result-card');
        @else
            // フッター表示
            AdjustStyles.displayFooter('search');
        @endif
    }

</script>

@endsection
