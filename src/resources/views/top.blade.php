@extends('layouts.app')

@section('content')
<form action="{{ route('debayashi.search.index') }}" method="post">
    {{ csrf_field() }}
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="cover-heading text-white">
                <span>デバヤシ</span><br>
                <span>コレヤシ</span>
            </h1>
            <p class="lead text-white">＼ あの芸人の出囃子を検索しよう ／</p>
            <div class="">
                <input id="search-button" type="submit" class="input-search rounded" value="">
                <input id="search-keyword" type="search" name="search_keyword" class="form-control-lg search rounded" placeholder="コンビ名で検索" required="">
            </div>
        </div>
    </div>
</form>
@endsection
