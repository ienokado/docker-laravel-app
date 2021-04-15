@extends('admin.layout.layout')

@section('title', '芸人一覧')
@section('mainContent')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">{{ __('芸人情報') }}</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">{{ __('芸人一覧') }}</h4>
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('芸人のコンビ名') }}</th>
                            <th>{{ __('出囃子名') }}</th>
                            <th>{{ __('アーティスト名') }}</th>
                            <th>{{ __('登録日時') }}</th>
                            <th>{{ __('更新日時') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comedianGroups as $comedianGroup)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.comedian_group.edit', ['id' => $comedianGroup->id]) }}">
                                        {{ $comedianGroup->id }}
                                    </a>
                                </td>
                                <td>{{ $comedianGroup->name }}</td>
                                <td>
                                    @if ($comedianGroup->debayashi)
                                        {{ $comedianGroup->debayashi->name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($comedianGroup->debayashi)
                                        {{ $comedianGroup->debayashi->artist_name }}
                                    @endif
                                </td>
                                <td>{{ $comedianGroup->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $comedianGroup->updated_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
