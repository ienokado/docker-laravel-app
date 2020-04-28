@extends('layouts.app_bg_custom')

@section('content')

@if ($historyExists)
{{-- 履歴がある場合 --}}
<div class="content-wrapper">
    <form action="" method="post" class="search-form">
        {{ csrf_field() }}
        <div class="history-search-box">
            <input id="search-keyword" type="text" name="search_keyword" class="history-search-text outline-none" placeholder="履歴を検索" required="">
            <button id="search-button" type="submit" class="history-search-btn outline-none">
            <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <ul class="history-card-list">

        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                {{-- @if ($debayashi ?? ''->spotifyInfos) --}}
                    {{-- <img id="artwork" src="{{ $debayashi ?? ''->spotifyInfos->image_url }}" alt="{{ $debayashi ?? ''->name }}"> --}}
                    <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e0255a45a496aec61567fa37865" alt="You Can't Stop the Beat">
                {{-- @elseif ($debayashi ?? ''->appleMusicInfos)
                    <img id="artwork" src="{{ $debayashi ?? ''->appleMusicInfos->image_url }}" alt="{{ $debayashi ?? ''->name }}">
                @else --}}
                {{-- <div class="history-card-debayashi-alt-img">
                </div> --}}
                {{-- メディアコントロール --}}
                {{-- @if ($debayashi ?? ''->spotifyInfos || $debayashi ?? ''->appleMusicInfos) --}}
                <div class="history-card-preview-area">
                    <div class="history-card-preview-control" data-id="99">
                        <div class="history-card-icon-base-circle">
                            <i id="" class="history-card-preview-control-icon fas fa-play" data-id="99"></i>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            </div>
            <div class="history-card-debayashi-info">
                <p class="history-card-item-comedian-group-name">ゆりやんレトリィバァ</p>
                <p class="history-card-item-debayashi-name">You Can't Stop the Beat</p>
                <p class="history-card-item-artist-name">HAIRSPRAY</p>
            </div>
            {{-- メディアソース --}}
            <audio src="https://p.scdn.co/mp3-preview/1cd8814df612045560a402a4310d1823f36cd7ca?cid=35322189a9fa4d0a92430cc1f3cac134" data-id="99"></audio>
            {{-- @if ($debayashi ?? ''->spotifyInfos && $debayashi ?? ''->spotifyInfos->preview_url)
            <audio id="music-preview" src="{{ $debayashi ?? ''->spotifyInfos->preview_url }}"></audio>
            @elseif ($debayashi ?? ''->appleMusicInfos && $debayashi ?? ''->appleMusicInfos->preview_url)
            <audio id="music-preview" src="{{ $debayashi ?? ''->appleMusicInfos->preview_url }}"></audio>
            @endif --}}
        </li>
        {{-- history-card --}}


        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e02702f221519bad0cef4c8b622" alt="プリプリSUMMERキッス">
                {{-- メディアコントロール --}}
                <div class="history-card-preview-area">
                    <div class="history-card-preview-control" data-id="54">
                        <div class="history-card-icon-base-circle">
                            <i id="" class="history-card-preview-control-icon fas fa-play" data-id="54"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-card-debayashi-info">
                <p class="history-card-item-comedian-group-name">ダークニンゲン</p>
                <p class="history-card-item-debayashi-name">プリプリSUMMERキッス</p>
                <p class="history-card-item-artist-name">SUPER☆GiRLS</p>
            </div>
            {{-- メディアソース --}}
            <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/Music/df/45/9a/mzi.ezcgzhps.aac.p.m4a" data-id="54"></audio>
        </li>
        {{-- history-card --}}

        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                <img class="card-artwork-img card-artwork-img-resize-default" src="https://is3-ssl.mzstatic.com/image/thumb/Music/v4/c7/7f/3a/c77f3a84-ab9f-8894-7393-2737196499d6/jacket_ESCB01555B01A_600over.jpg/300x300bb.jpeg" alt="Hollo!  Orange Sunshine">
                {{-- メディアコントロール --}}
                <div class="history-card-preview-area">
                    <div class="history-card-preview-control" data-id="35">
                        <div class="history-card-icon-base-circle">
                            <i id="" class="history-card-preview-control-icon fas fa-play" data-id="35"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-card-debayashi-info">

                <p class="history-card-item-comedian-group-name">コロコロチキチキペッパーズ</p>
                <p class="history-card-item-debayashi-name">Hollo!  Orange Sunshine</p>
                <p class="history-card-item-artist-name">JUDY AND MARY</p>
            </div>
            {{-- メディアソース --}}
            <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/Music6/v4/e9/63/2a/e9632aff-a635-284d-08a2-0a34ece293c2/mzaf_4945656996555465998.plus.aac.p.m4a" data-id="35"></audio>
        </li>
        {{-- history-card --}}

        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e02e637c5a7e437b260589771f0" alt="愛と悲しみの時差">
                {{-- メディアコントロール --}}
                <div class="history-card-preview-area">
                    <div class="history-card-preview-control" data-id="38">
                        <div class="history-card-icon-base-circle">
                            <i class="history-card-preview-control-icon fas fa-play" data-id="38"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-card-debayashi-info">
                <p class="history-card-item-comedian-group-name">さや香</p>
                <p class="history-card-item-debayashi-name">愛と悲しみの時差</p>
                <p class="history-card-item-artist-name">山本彩</p>
            </div>
            {{-- メディアソース --}}
            <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/Music3/v4/26/36/1a/26361a3b-4781-ed2c-65a8-55a67e6e04c4/mzaf_4392790064539071303.plus.aac.p.m4a" data-id="38"></audio>
        </li>
        {{-- history-card --}}

        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                <div class="history-card-debayashi-alt-img">
                </div>
                {{-- メディアコントロール --}}
            </div>
            <div class="history-card-debayashi-info">
                <p class="history-card-item-comedian-group-name">アインシュタイン</p>
                <p class="history-card-item-debayashi-name">start</p>
                <p class="history-card-item-artist-name">locofrank</p>
            </div>
            {{-- メディアソース --}}
        </li>
        {{-- history-card --}}

        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e026d9b9a3d3c42456d0fb3d964" alt="Monster">
                {{-- メディアコントロール --}}
                <div class="history-card-preview-area">
                    <div class="history-card-preview-control" data-id="19">
                        <div class="history-card-icon-base-circle">
                            <i class="history-card-preview-control-icon fas fa-play" data-id="19"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-card-debayashi-info">
                <p class="history-card-item-comedian-group-name">オズワルド</p>
                <p class="history-card-item-debayashi-name">Monster</p>
                <p class="history-card-item-artist-name">嵐</p>
            </div>
            {{-- メディアソース --}}
            <audio src="https://p.scdn.co/mp3-preview/74fc3f420ec766f04aa3db16f8a81e809e2c5d9f?cid=35322189a9fa4d0a92430cc1f3cac134" data-id="19"></audio>
        </li>
        {{-- history-card --}}

        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                <div class="history-card-debayashi-alt-img">
                </div>
                {{-- メディアコントロール --}}
            </div>
            <div class="history-card-debayashi-info">
                <p class="history-card-item-comedian-group-name">かまいたち</p>
                <p class="history-card-item-debayashi-name">イーディーピー ～飛んで火に入る夏の君～</p>
                <p class="history-card-item-artist-name">RADWIMPS</p>
            </div>
            {{-- メディアソース --}}
        </li>
        {{-- history-card --}}

        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e026d9b9a3d3c42456d0fb3d964" alt="Monster">
                {{-- メディアコントロール --}}
                <div class="history-card-preview-area">
                    <div class="history-card-preview-control" data-id="19">
                        <div class="history-card-icon-base-circle">
                            <i class="history-card-preview-control-icon fas fa-play" data-id="19"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-card-debayashi-info">
                <p class="history-card-item-comedian-group-name">オズワルド</p>
                <p class="history-card-item-debayashi-name">Monster</p>
                <p class="history-card-item-artist-name">嵐</p>
            </div>
            {{-- メディアソース --}}
            <audio src="https://p.scdn.co/mp3-preview/74fc3f420ec766f04aa3db16f8a81e809e2c5d9f?cid=35322189a9fa4d0a92430cc1f3cac134" data-id="19"></audio>
        </li>
        {{-- history-card --}}

        {{-- history-card --}}
        <li class="history-card-list-item">
            <div class="history-card-debayashi-img">
                {{-- アートワーク --}}
                <img class="card-artwork-img card-artwork-img-resize-default" src="https://is1-ssl.mzstatic.com/image/thumb/Music/4e/83/67/mzi.htmusnpd.jpg/300x300bb.jpeg" alt="Monster">
                {{-- メディアコントロール --}}
                <div class="history-card-preview-area">
                    <div class="history-card-preview-control" data-id="21">
                        <div class="history-card-icon-base-circle">
                            <i class="history-card-preview-control-icon fas fa-play" data-id="21"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="history-card-debayashi-info">
                <p class="history-card-item-comedian-group-name">オリエンタルラジオ</p>
                <p class="history-card-item-debayashi-name">Monster</p>
                <p class="history-card-item-artist-name">ELLEGARDEN</p>
            </div>
            {{-- メディアソース --}}
            <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview71/v4/cd/90/51/cd905127-2050-8193-fd58-b397c1c182ca/mzaf_3996056647492457639.plus.aac.p.m4a" data-id="21"></audio>
        </li>
        {{-- history-card --}}
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
        // アートワークリサイズ
        FunctionsLib.resizeArtwork();
        // (試聴用)プレビューエリア生成, イベントリスナー生成
        FunctionsLib.createPreviewAreaForCardItem('history');
        // フッター表示
        FunctionsLib.displayFooter('history');
    }
</script>
@endsection
