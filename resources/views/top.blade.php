@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center h-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center">できるうちに青春を楽しめ。変数名で迷っている時間はない。</div>
        </div>
        <div class="row justify-content-center">
            <div class="text-center h1">Gather roses while you may</div>
        </div>
        <div class="row">
            <div class="col-lg-6 pt-5">
                <a href="{{ url('/search') }}" class="btn btn-outline-dark btn-lg btn-block">
                    変数名を検索
                </a>
            </div>
            <div class="col-lg-6 pt-5">
                <a href="{{ url('/naming') }}" class="btn btn-outline-dark btn-lg btn-block">
                    変数名を決める
                </a>
            </div>
        </div>
    </div>
</div>
@endsection