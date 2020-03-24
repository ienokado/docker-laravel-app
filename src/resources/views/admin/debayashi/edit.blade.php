@extends('admin.layout.layout')

@section('title', '出囃子登録')
@section('mainContent')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">{{ __('出囃子情報') }}</h4>
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-12">
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">{{ __('出囃子登録') }}</h6>
                    <div class="mT-30">
                        <form action="{{ route('admin.debayashi.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $debayashi->id }}">
                            <div class="form-group">
                                <label for="input-debayashi-name">{{ __('出囃子名') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ $debayashi->name }}">
                            </div>
                            <div class="form-group">
                                <label for="input-debayashi-name">{{ __('アーティスト名') }}</label>
                                <input type="text" class="form-control" name="artist_name" value="{{ $debayashi->artist_name }}">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('登録') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
