@extends('admin.layout.layout')

@section('title', '出囃子一覧')
@section('mainContent')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">{{ __('出囃子情報') }}</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">{{ __('出囃子一覧') }}</h4>
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('出囃子名') }}</th>
                            <th>{{ __('アーティスト名') }}</th>
                            <th>{{ __('芸人のコンビ名') }}</th>
                            <th>{{ __('登録日時') }}</th>
                            <th>{{ __('更新日時') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($debayashis as $debayashi)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.debayashi.edit', ['id' => $debayashi->id]) }}">
                                        {{ $debayashi->id }}
                                    </a>
                                </td>
                                <td>{{ $debayashi->name }}</td>
                                <td>{{ $debayashi->artist_name }}</td>
                                <td>
                                    @foreach ($debayashi->comedianGroups as $comedianGroup)
                                        {{ $comedianGroup->name }}
                                    @endforeach
                                </td>
                                <td>{{ $debayashi->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $debayashi->updated_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
