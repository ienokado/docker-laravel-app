@extends('layouts.app')
@section('body_class', 'body-bg-pink')
@section('content')

@if (count($comedianGroups) > 0)
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

    <ul class="card-list history-card-list" id="history-list">
        @foreach ($comedianGroups as $comedianGroup)

            <li class="card-list-item">
                @include('debayashi.list-item', ['comedianGroup' => $comedianGroup])
            </li>

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
