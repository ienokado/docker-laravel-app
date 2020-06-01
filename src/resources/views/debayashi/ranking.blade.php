@extends('layouts.app')

@section('body_class', 'body-bg-pink')

@section('content')
@if (count($comedianGroups) > 0)
<div class="content-wrapper">

    <ul class="card-list" id="ranking-list">
        @foreach ($comedianGroups as $key => $comedianGroup)

            <li class="card-list-item @if($key === 0) ranking-top @endif">
                <div class="ranking-order">
                    <p>{{ $key + 1 }}</p>
                </div>
                @include('debayashi.list-item', ['comedianGroup' => $comedianGroup])
            </li>

        @endforeach
    </ul>

    <ul class="paging-btn-list">
        <li @if ($comedianGroups->currentPage() !== 1)class="paging-btn"@endif>
            @if ($comedianGroups->currentPage() !== 1)
                <a href="{{ $comedianGroups->previousPageUrl() }}">
                    <i class="fas fa-arrow-left"></i>
                </a>
            @endif
        </li>
        <li @if ($comedianGroups->hasMorePages())class="paging-btn"@endif>
            @if ($comedianGroups->hasMorePages())
                <a class="" href="{{ $comedianGroups->nextPageUrl() }}">
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

