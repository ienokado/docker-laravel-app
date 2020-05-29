@extends('layouts.app')

@section('body_class', 'body-bg-pink')

@section('content')
@if (count($comedianGroups) > 0)
<div class="content-wrapper">

    <ul class="card-list" id="ranking-list">
        @foreach ($comedianGroups as $comedianGroup)

            <li class="card-list-item">
                <div class="ranking-order">
                    <p>{{ $loop->iteration }}</p>
                </div>
                @include('debayashi.list-item', ['comedianGroup' => $comedianGroup])
            </li>

        @endforeach
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

