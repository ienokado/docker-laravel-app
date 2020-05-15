@extends('layouts.app_bg_custom')

@section('content')

@if (count($debayashis) > 0)
{{-- 履歴がある場合 --}}
<div class="content-wrapper">
    <form action="" method="" class="search-form">
        {{ csrf_field() }}
        <div class="history-search-box">
            <input id="search-keyword" type="text" name="search_keyword" class="history-search-text outline-none" placeholder="履歴を検索" required="">
            <button id="search-button" type="submit" class="history-search-btn outline-none">
            <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <ul class="history-card-list">
        @foreach ($debayashis as $debayashi)
            {{-- history-card --}}
            <li class="history-card-list-item">
                {{-- アートワーク --}}
                <div class="history-card-debayashi-img">
                    @if ($debayashi->spotifyInfos)
                        <img class="history-card-debayashi-img-resize" src="{{ $debayashi->spotifyInfos->image_url }}" alt="{{ $debayashi->name }}">
                    @elseif ($debayashi->appleMusicInfos)
                        <img class="history-card-debayashi-img-resize" src="{{ $debayashi->appleMusicInfos->image_url}}" alt="{{ $debayashi->name }}">
                    @else
                        <div class="history-card-debayashi-alt-img">
                        </div>
                    @endif
                    {{-- メディアコントロール --}}
                    @if ($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
                        <div class="history-card-preview-area">
                            <div class="history-card-preview-control" data-id="{{ $debayashi->id}}">
                                <div class="history-card-icon-base-circle">
                                    <i class="history-card-preview-control-icon fas fa-play" data-id="{{ $debayashi->id}}"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="history-card-debayashi-info">
                    <p class="history-card-item-comedian-group-name">{{ $debayashi->comedianGroups[0]->name }}</p>
                    <p class="history-card-item-debayashi-name">{{ $debayashi->name }}</p>
                    <p class="history-card-item-artist-name">{{ $debayashi->artist_name }}</p>
                </div>
                {{-- メディアソース --}}
                @if ($debayashi->spotifyInfos && $debayashi->spotifyInfos->preview_url)
                    <audio src="{{ $debayashi->spotifyInfos->preview_url }}" data-id="{{ $debayashi->id}}"></audio>
                @elseif ($debayashi->appleMusicInfos && $debayashi->appleMusicInfos->preview_url)
                    <audio src="{{ $debayashi->appleMusicInfos->preview_url }}" data-id="{{ $debayashi->id}}"></audio>
                @endif
            </li>
            {{-- history-card --}}
        @endforeach
    </ul>

    <ul class="history-paging-btn-list">
        <li class="history-paging-btn btn-inactive">
            <i class="fas fa-arrow-left"></i>
        </li>
        <li class="history-paging-btn">
            <i class="fas fa-arrow-right"></i>
        </li>
    </ul>
</div>
@else
    {{-- 履歴がない場合 --}}
    <div class="history-not-exists-wrapper">
        <div class="history-not-exists-msg">
            <p>検索履歴が<br>ありません</p>
        </div>
        <div class="history-not-exists-img">
          <img class="history-not-exists-img-microphone" src="{{ asset('images/error/microphone.svg')}}">
        </div>
    </div>
@endif
@endsection

<!-- 履歴検索ヒット時 -->
@section('javascript')
<script src="{{ asset('/js/functionsLib.js') }}"></script>
<script>

    window.CardItem = {};
    window.CardItem.audios = document.querySelectorAll('audio');
    window.CardItem.icons = document.querySelectorAll('.history-card-preview-control-icon');

    window.onload = function () {
        // (試聴用)プレビューエリア生成, イベントリスナー生成
        FunctionsLib.createPreviewAreaForCardItem('history');
        // フッター表示
        FunctionsLib.displayFooter('history');
    }
</script>
@endsection
