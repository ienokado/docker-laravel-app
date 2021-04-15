@extends('admin.layout.layout')

@section('title', '芸人登録')
@section('mainContent')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">{{ __('芸人一覧') }}</h4>
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-12">
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">{{ __('芸人登録') }}</h6>
                    <div class="mT-30">
                        <form action="{{ route('admin.comedian_group.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $comedianGroup->id }}">
                            <div class="form-group">
                                <label for="input-comedian-group-name">{{ __('芸人のコンビ名') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ $comedianGroup->name }}">
                            </div>
                            <div class="form-group">
                                <label for="input-debayashi-id">{{ __('出囃子') }}</label>
                                <select name="debayashi_id" class="form-control">
                                    <option value>{{ __('未選択') }}</option>
                                    @foreach ($selectValues as $id => $value)
                                        <option value="{{ $id }}" @if ($comedianGroup->debayashi && $comedianGroup->debayashi->id == $id) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
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
