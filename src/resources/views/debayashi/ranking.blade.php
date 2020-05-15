@extends('layouts.app_bg_custom')

@section('content')

@if (count($debayashis) > 0)
<div class="content-wrapper">

    <ul class="ranking-card-list">
        @foreach ($debayashis as $debayashi)
            {{-- ranking-card --}}
            <li class="ranking-card-list-item">
                <div class="ranking-order">
                    <p>{{$loop->iteration}}</p>
                </div>
                <div class="ranking-card-contents">
                    <div class="ranking-card-debayashi-img">
                        {{-- アートワーク --}}
                        @if ($debayashi->spotifyInfos)
                            <img class="ranking-card-debayashi-img-resize" src="{{ $debayashi->spotifyInfos->image_url }}" alt="{{ $debayashi->name }}">
                        @elseif ($debayashi->appleMusicInfos)
                            <img class="ranking-card-debayashi-img-resize" src="{{ $debayashi->appleMusicInfos->image_url}}" alt="{{ $debayashi->name }}">
                        @else
                            <div class="ranking-card-debayashi-alt-img">
                            </div>
                        @endif
                        {{-- メディアコントロール --}}
                        @if ($debayashi->spotifyInfos || $debayashi->appleMusicInfos)
                            <div class="ranking-card-preview-area">
                                <div class="ranking-card-preview-control" data-id="{{ $debayashi->id}}">
                                    <div class="ranking-card-icon-base-circle">
                                        <i class="ranking-card-preview-control-icon fas fa-play" data-id="{{ $debayashi->id}}"></i>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="ranking-card-debayashi-info">
                        <p class="ranking-card-item-comedian-group-name">{{ $debayashi->comedianGroups[0]->name }}</p>
                        <p class="ranking-card-item-debayashi-name">{{ $debayashi->name }}</p>
                        <p class="ranking-card-item-artist-name">{{ $debayashi->artist_name }}</p>
                    </div>
                    {{-- メディアソース --}}
                    @if ($debayashi->spotifyInfos && $debayashi->spotifyInfos->preview_url)
                        <audio src="{{ $debayashi->spotifyInfos->preview_url }}" data-id="{{ $debayashi->id}}"></audio>
                    @elseif ($debayashi->appleMusicInfos && $debayashi->appleMusicInfos->preview_url)
                        <audio src="{{ $debayashi->appleMusicInfos->preview_url }}" data-id="{{ $debayashi->id}}"></audio>
                    @endif
            </li>
            {{-- ranking-card --}}
        @endforeach
    </ul>

</div>
@endif
@endsection

@section('javascript')
<script src="{{ asset('/js/functionsLib.js') }}"></script>
<script>
    window.CardItem = {};
    window.CardItem.audios = document.querySelectorAll('audio');
    window.CardItem.icons = document.querySelectorAll('.ranking-card-preview-control-icon');

    window.onload = function () {
        // (試聴用)プレビューエリア生成, イベントリスナー生成
        FunctionsLib.createPreviewAreaForCardItem('ranking');
        // フッター表示
        FunctionsLib.displayFooter('ranking');
    }
</script>
@endsection

