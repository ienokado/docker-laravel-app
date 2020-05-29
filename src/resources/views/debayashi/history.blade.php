@extends('layouts.app')

@section('body_class', 'body-bg-pink')

@section('content')
@if (count($comedianGroups) > 0)
{{-- 履歴がある場合 --}}
<div class="content-wrapper">
    <form action="{{ route('debayashi.history') }}" method="post" class="search-form">
        {{ csrf_field() }}
        <div class="history-search-box">
            <input id="search-keyword" class="history-search-text outline-none" type="text" name="search_keyword" placeholder="履歴を検索" value="{{ old('search_keyword') ? : $params['search_keyword'] }}">
            <button id="search-button" type="submit" class="history-search-btn outline-none">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <ul class="card-list history-card-list" id="history-list">
        @foreach ($comedianGroups as $comedianGroup)

            <li class="card-list-item">
                @include('debayashi.list-item', ['comedianGroup' => $comedianGroup])
            </li>

        @endforeach
    </ul>

    <ul class="history-paging-btn-list">
        <li @if ($comedianGroups->currentPage() !== 1)class="history-paging-btn btn-inactive"@endif>
            @if ($comedianGroups->currentPage() !== 1)
                <a href="{{ $comedianGroups->appends($params)->previousPageUrl() }}">
                    <i class="fas fa-arrow-left"></i>
                </a>
            @endif
        </li>
        <li @if ($comedianGroups->hasMorePages())class="history-paging-btn"@endif>
            @if ($comedianGroups->hasMorePages())
                <a class="" href="{{ $comedianGroups->appends($params)->nextPageUrl() }}">
                    <i class="fas fa-arrow-right"></i>
                </a>
            @endif
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
            <img class="history-not-exists-img-microphone" src="{{ asset('images/error/microphone.svg') }}">
        </div>
    </div>
@endif
@endsection

<!-- 履歴検索ヒット時 -->
@section('javascript')
<script>

    window.CardItem = {};
    window.CardItem.audios = document.querySelectorAll('audio');
    window.CardItem.icons = document.querySelectorAll('.card-preview-control-icon');

    window.onload = function () {
        // (試聴用)プレビューエリア生成, イベントリスナー生成
        PlayDebayashis.createPreviewArea();
        // フッター表示
        AdjustStyles.displayFooter('history');
    }
</script>
@endsection
