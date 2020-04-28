@extends('layouts.app_bg_custom')

@section('content')

<div class="content-wrapper">

    <ul class="ranking-card-list">

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
            <div class="ranking-order">
                <p>1</p>
            </div>
            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    {{-- @if ($debayashi ?? ''->spotifyInfos) --}}
                        {{-- <img id="artwork" src="{{ $debayashi ?? ''->spotifyInfos->image_url }}" alt="{{ $debayashi ?? ''->name }}"> --}}
                        <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e0255a45a496aec61567fa37865" alt="You Can't Stop the Beat">
                    {{-- @elseif ($debayashi ?? ''->appleMusicInfos)
                        <img id="artwork" src="{{ $debayashi ?? ''->appleMusicInfos->image_url }}" alt="{{ $debayashi ?? ''->name }}">
                    @else --}}
                    {{-- <div class="ranking-card-debayashi-alt-img">
                    </div> --}}
                    {{-- メディアコントロール --}}
                    {{-- @if ($debayashi ?? ''->spotifyInfos || $debayashi ?? ''->appleMusicInfos) --}}
                    <div class="ranking-card-preview-area">
                        <div class="ranking-card-preview-control" data-id="99">
                            <div class="ranking-card-icon-base-circle">
                                <i id="" class="ranking-card-preview-control-icon fas fa-play" data-id="99"></i>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                </div>
                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">ゆりやんレトリィバァ</p>
                    <p class="ranking-card-item-debayashi-name">You Can't Stop the Beat</p>
                    <p class="ranking-card-item-artist-name">HAIRSPRAY</p>
                </div>
                {{-- </div> --}}
                {{-- メディアソース --}}
                <audio src="https://p.scdn.co/mp3-preview/1cd8814df612045560a402a4310d1823f36cd7ca?cid=35322189a9fa4d0a92430cc1f3cac134" data-id="99"></audio>
                {{-- @if ($debayashi ?? ''->spotifyInfos && $debayashi ?? ''->spotifyInfos->preview_url)
                <audio id="music-preview" src="{{ $debayashi ?? ''->spotifyInfos->preview_url }}"></audio>
                @elseif ($debayashi ?? ''->appleMusicInfos && $debayashi ?? ''->appleMusicInfos->preview_url)
                <audio id="music-preview" src="{{ $debayashi ?? ''->appleMusicInfos->preview_url }}"></audio>
                @endif --}}
            </div>
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
            <div class="ranking-order">
                <p>2</p>
            </div>
            <div class="ranking-card-contents">

                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e02702f221519bad0cef4c8b622" alt="プリプリSUMMERキッス">
                    {{-- メディアコントロール --}}
                    <div class="ranking-card-preview-area">
                        <div class="ranking-card-preview-control" data-id="54">
                            <div class="ranking-card-icon-base-circle">
                                <i id="" class="ranking-card-preview-control-icon fas fa-play" data-id="54"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">ダークニンゲン</p>
                    <p class="ranking-card-item-debayashi-name">プリプリSUMMERキッス</p>
                    <p class="ranking-card-item-artist-name">SUPER☆GiRLS</p>
                </div>
                {{-- メディアソース --}}
                <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/Music/df/45/9a/mzi.ezcgzhps.aac.p.m4a" data-id="54"></audio>
            </div>
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
            <div class="ranking-order">
                <p>3</p>
            </div>
            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <img class="card-artwork-img card-artwork-img-resize-default" src="https://is3-ssl.mzstatic.com/image/thumb/Music/v4/c7/7f/3a/c77f3a84-ab9f-8894-7393-2737196499d6/jacket_ESCB01555B01A_600over.jpg/300x300bb.jpeg" alt="Hollo!  Orange Sunshine">
                    {{-- メディアコントロール --}}
                    <div class="ranking-card-preview-area">
                        <div class="ranking-card-preview-control" data-id="35">
                            <div class="ranking-card-icon-base-circle">
                                <i id="" class="ranking-card-preview-control-icon fas fa-play" data-id="35"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ranking-card-debayashi-info">

                    <p class="ranking-card-item-comedian-group-name">コロコロチキチキペッパーズ</p>
                    <p class="ranking-card-item-debayashi-name">Hollo!  Orange Sunshine</p>
                    <p class="ranking-card-item-artist-name">JUDY AND MARY</p>
                </div>
                {{-- メディアソース --}}
                <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/Music6/v4/e9/63/2a/e9632aff-a635-284d-08a2-0a34ece293c2/mzaf_4945656996555465998.plus.aac.p.m4a" data-id="35"></audio>
            </div>
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
            <div class="ranking-order">
                <p>4</p>
            </div>
            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e02e637c5a7e437b260589771f0" alt="愛と悲しみの時差">
                    {{-- メディアコントロール --}}
                    <div class="ranking-card-preview-area">
                        <div class="ranking-card-preview-control" data-id="38">
                            <div class="ranking-card-icon-base-circle">
                                <i class="ranking-card-preview-control-icon fas fa-play" data-id="38"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">さや香</p>
                    <p class="ranking-card-item-debayashi-name">愛と悲しみの時差</p>
                    <p class="ranking-card-item-artist-name">山本彩</p>
                </div>
                {{-- メディアソース --}}
                <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/Music3/v4/26/36/1a/26361a3b-4781-ed2c-65a8-55a67e6e04c4/mzaf_4392790064539071303.plus.aac.p.m4a" data-id="38"></audio>
            </div>
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
                <div class="ranking-order">
                    <p>5</p>
                </div>
            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <div class="ranking-card-debayashi-alt-img">
                    </div>
                    {{-- メディアコントロール --}}
                </div>
                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">アインシュタイン</p>
                    <p class="ranking-card-item-debayashi-name">start</p>
                    <p class="ranking-card-item-artist-name">locofrank</p>
                </div>
            </div>
            {{-- メディアソース --}}
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
            <div class="ranking-order">
                <p>6</p>
            </div>
            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e02948a73fdd6cb6e923ac05eca" alt="Let’s ダバダバ">
                    {{-- メディアコントロール --}}
                    <div class="ranking-card-preview-area">
                        <div class="ranking-card-preview-control" data-id="15">
                            <div class="ranking-card-icon-base-circle">
                                <i class="ranking-card-preview-control-icon fas fa-play" data-id="15"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">インディアンス</p>
                    <p class="ranking-card-item-debayashi-name">Let’s ダバダバ</p>
                    <p class="ranking-card-item-artist-name">POLYSICS</p>
                </div>
            </div>
            {{-- メディアソース --}}
            <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/Music/v4/cd/10/ca/cd10caa7-e9d4-db48-123e-26fcc89322fe/mzaf_1720473002371469657.plus.aac.p.m4a" data-id="15"></audio>
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
            <div class="ranking-order">
                <p>7</p>
            </div>
            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <div class="ranking-card-debayashi-alt-img">
                    </div>
                    {{-- メディアコントロール --}}
                </div>
                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">かまいたち</p>
                    <p class="ranking-card-item-debayashi-name">イーディーピー ～飛んで火に入る夏の君～</p>
                    <p class="ranking-card-item-artist-name">RADWIMPS</p>
                </div>
            </div>
            {{-- メディアソース --}}
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">

                <div class="ranking-order">
                    <p>8</p>
                </div>
            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e026d9b9a3d3c42456d0fb3d964" alt="Monster">
                    {{-- メディアコントロール --}}
                    <div class="ranking-card-preview-area">
                        <div class="ranking-card-preview-control" data-id="19">
                            <div class="ranking-card-icon-base-circle">
                                <i class="ranking-card-preview-control-icon fas fa-play" data-id="19"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">オズワルド</p>
                    <p class="ranking-card-item-debayashi-name">Monster</p>
                    <p class="ranking-card-item-artist-name">嵐</p>
                </div>
            </div>
            {{-- メディアソース --}}
            <audio src="https://p.scdn.co/mp3-preview/74fc3f420ec766f04aa3db16f8a81e809e2c5d9f?cid=35322189a9fa4d0a92430cc1f3cac134" data-id="19"></audio>
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
            <div class="ranking-order">
                <p>10</p>
            </div>

            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <img class="card-artwork-img card-artwork-img-resize-default" src="https://is1-ssl.mzstatic.com/image/thumb/Music/4e/83/67/mzi.htmusnpd.jpg/300x300bb.jpeg" alt="Monster">
                    {{-- メディアコントロール --}}
                    <div class="ranking-card-preview-area">
                        <div class="ranking-card-preview-control" data-id="21">
                            <div class="ranking-card-icon-base-circle">
                                <i class="ranking-card-preview-control-icon fas fa-play" data-id="21"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">オリエンタルラジオ</p>
                    <p class="ranking-card-item-debayashi-name">Monster</p>
                    <p class="ranking-card-item-artist-name">ELLEGARDEN</p>
                </div>
            </div>

            {{-- メディアソース --}}
            <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview71/v4/cd/90/51/cd905127-2050-8193-fd58-b397c1c182ca/mzaf_3996056647492457639.plus.aac.p.m4a" data-id="21"></audio>
        </li>
        {{-- ranking-card --}}

        {{-- ranking-card --}}
        <li class="ranking-card-list-item">
            <div class="ranking-order">
                <p>100</p>
            </div>
            <div class="ranking-card-contents">
                <div class="ranking-card-debayashi-img">
                    {{-- アートワーク --}}
                    <img class="card-artwork-img card-artwork-img-resize-default" src="https://i.scdn.co/image/ab67616d00001e02bdbcdcb784d931dfff0719a8" alt="ROCKET DIVE">
                    {{-- メディアコントロール --}}
                    <div class="ranking-card-preview-area">
                        <div class="ranking-card-preview-control" data-id="120">
                            <div class="ranking-card-icon-base-circle">
                                <i class="ranking-card-preview-control-icon fas fa-play" data-id="120"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ranking-card-debayashi-info">
                    <p class="ranking-card-item-comedian-group-name">十手リンジン</p>
                    <p class="ranking-card-item-debayashi-name">ROCKET DIVE</p>
                    <p class="ranking-card-item-artist-name">hide</p>
                </div>
                {{-- メディアソース --}}
                <audio src="https://audio-ssl.itunes.apple.com/itunes-assets/AudioPreview128/v4/6a/12/b7/6a12b7e0-b8bf-878f-1c6c-80d5d84c9290/mzaf_6082668908507068639.plus.aac.p.m4a" data-id="120"></audio>
            </div>
        </li>
        {{-- ranking-card --}}
    </ul>

</div>
@endsection

@section('javascript')
<script src="{{ asset('/js/functionsLib.js') }}"></script>
<script>
    window.CardItem = {};
    window.CardItem.audios = document.querySelectorAll('audio');
    window.CardItem.icons = document.querySelectorAll('.ranking-card-preview-control-icon');

    window.onload = function () {
        // アートワークリサイズ
        FunctionsLib.resizeArtwork();
        // (試聴用)プレビューエリア生成, イベントリスナー生成
        FunctionsLib.createPreviewAreaForCardItem('ranking');
        // フッター表示
        FunctionsLib.displayFooter('ranking');
    }
</script>
@endsection

