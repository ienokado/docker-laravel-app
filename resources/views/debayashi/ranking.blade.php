@extends('layouts.app')

@section('body_class', 'body-bg-pink')

@section('content')
@if (count($searchHistories) > 0)
<div class="content-wrapper">

    <ul class="card-list" id="ranking-list">
        @foreach ($searchHistories as $key => $searchHistory)


            <li class="card-list-item @if (($searchHistories->firstItem() + $key) === 1)ranking-top @endif">
                <div class="ranking-order">
                    <p>{{ $searchHistories->firstItem() + $key }}</p>
                </div>
                @include('debayashi.list-item', ['comedianGroup' => $searchHistory->comedianGroup])
            </li>

        @endforeach
    </ul>

    <div class="paging-btn-area">
        @if ($searchHistories->currentPage() !== 1)
            <a href="{{ $searchHistories->previousPageUrl() }}" class="paging-btn back-btn">
                <i class="fas fa-arrow-left"></i>
            </a>
        @endif

        @if ($searchHistories->hasMorePages())
            <a href="{{ $searchHistories->nextPageUrl() }}" class="paging-btn forward-btn">
                <i class="fas fa-arrow-right"></i>
            </a>
        @endif
    </div>
</div>

@endif
@endsection

@section('javascript')
<script>
    window.CardItem = {};
    window.CardItem.audios = document.querySelectorAll('audio');
    window.CardItem.icons = document.querySelectorAll('.card-preview-control-icon');

    window.onload = function () {
        // (試聴用)プレビューエリア生成, イベントリスナー生成
        PlayDebayashis.createPreviewArea();
        // フッター表示
        AdjustStyles.displayFooter('ranking');
    }
</script>
@endsection

