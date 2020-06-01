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

    <ul class="paging-btn-list">
        <li @if ($searchHistories->currentPage() !== 1)class="paging-btn"@endif>
            @if ($searchHistories->currentPage() !== 1)
                <a href="{{ $searchHistories->previousPageUrl() }}">
                    <i class="fas fa-arrow-left"></i>
                </a>
            @endif
        </li>
        <li @if ($searchHistories->hasMorePages())class="paging-btn"@endif>
            @if ($searchHistories->hasMorePages())
                <a class="" href="{{ $searchHistories->nextPageUrl() }}">
                    <i class="fas fa-arrow-right"></i>
                </a>
            @endif
        </li>
    </ul>
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

