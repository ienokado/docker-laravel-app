@extends('admin.layout.layout')

@section('title', 'リクエストログ')
@section('mainContent')
<div class="container-fluid">
    <h4 class="c-grey-900 mT-10 mB-30">リクエストログ</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">ユーザー検索キーワードログ</h4>
                @foreach ($logs as $log)
                    <p>{{ $log }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
