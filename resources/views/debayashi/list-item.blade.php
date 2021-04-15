<div class="card-contents">
    <div class="card-debayashi-img @if ($comedianGroup->debayashi && ($comedianGroup->debayashi->spotifyInfos || $comedianGroup->debayashi->appleMusicInfos))card-preview-area-base @endif">
        {{-- アートワーク --}}
        @if ($comedianGroup->debayashi && $comedianGroup->debayashi->spotifyInfos)
            <img class="card-debayashi-img-resize" src="{{ $comedianGroup->debayashi->spotifyInfos->image_url }}" alt="{{ $comedianGroup->debayashi->name }}">
        @elseif ($comedianGroup->debayashi && $comedianGroup->debayashi->appleMusicInfos)
            <img class="card-debayashi-img-resize" src="{{ $comedianGroup->debayashi->appleMusicInfos->image_url }}" alt="{{ $comedianGroup->debayashi->name }}">
        @else
            <div class="card-debayashi-alt-img">
                <p>No Image</p>
            </div>
        @endif
        {{-- メディアコントロール --}}
        @if ($comedianGroup->debayashi && ($comedianGroup->debayashi->spotifyInfos || $comedianGroup->debayashi->appleMusicInfos))
            <div class="card-preview-area">
                <div class="card-preview-control" data-id="{{ $comedianGroup->debayashi->id }}">
                    <div class="card-icon-base-circle">
                        <i class="card-preview-control-icon fas fa-play" data-id="{{ $comedianGroup->debayashi->id }}"></i>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="card-debayashi-info">
        <p class="card-item-comedian-group-name">{{ $comedianGroup->name }}</p>
        <p class="card-item-debayashi-name">{{ $comedianGroup->debayashi ? $comedianGroup->debayashi->name : "" }}</p>
        <p class="card-item-artist-name">{{ $comedianGroup->debayashi ? $comedianGroup->debayashi->artist_name : "" }}</p>
    </div>
    {{-- メディアソース --}}
    @if ($comedianGroup->debayashi && ($comedianGroup->debayashi->spotifyInfos && $comedianGroup->debayashi->spotifyInfos->preview_url))
        <audio src="{{ $comedianGroup->debayashi->spotifyInfos->preview_url }}" data-id="{{ $comedianGroup->debayashi->id }}"></audio>
    @elseif ($comedianGroup->debayashi && ($comedianGroup->debayashi->appleMusicInfos && $comedianGroup->debayashi->appleMusicInfos->preview_url))
        <audio src="{{ $comedianGroup->debayashi->appleMusicInfos->preview_url }}" data-id="{{ $comedianGroup->debayashi->id }}"></audio>
    @endif
</div>
