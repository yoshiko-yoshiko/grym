@php
$naming_rules = [
    ['snake', 'スネークケース', 'snake_case'],
    ['constant', 'コンスタントケース', 'CONSTANT_CASE'],
    ['chain', 'チェインケース', 'chain-case'],
    ['camel', 'キャメルケース', 'camelCase'],
    ['pascal', 'パスカルケース', 'PascalCase']
];
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between py-5">
        <div class="btn-group btn-group-toggle py-1" data-toggle="buttons">
            @foreach ($naming_rules as $array)
            <label class="btn btn-outline-dark
            @if($array[0] === $checked)
            active
            @endif
            ">
                <input type="radio" name="naming-rule" form="naming-form" value={{ $array[0] }}
                @if($array[0] === $checked)
                checked = checked
                @endif
                ><small>{{ $array[1] }}</small><br>{{ $array[2] }}
            </label>
            @endforeach
        </div>
        <div class="py-1">
            <button class="btn btn-outline-dark" onclick="copy()">コピー</button>
            <button class="btn btn-outline-dark" type="submit" value="bookmark" form="bookmark">ブックマーク</button>
        </div>
    </div>
    <div class="row">
        <form class="col-lg-6" action="{{ route('naming-post') }}" method="POST" name="naming-form" id="naming-form">
            @csrf
            <textarea class="form-control col-auto" rows="15" name="japanese" placeholder="日本語を入力してください。">@isset($japanese){{ $japanese }}@endisset</textarea>
            <div class="row py-4">
                <button class="btn btn-outline-dark" type="submit" value="send" form="naming-form">送信</button>
            </div>
        </form>
        <form class="col-lg-6" action="{{ route('bookmark') }}" method="POST" name="bookmark" id="bookmark">
            @csrf
            <textarea class="form-control col-auto" rows="15" name="variable-name" placeholder="変数名が出力されます。">@isset($variable_name){{ $variable_name }}@endisset</textarea>
            @isset($japanese)
            <input type="hidden" name="japanese" value={{ $japanese }}>
            @endisset
        </form>
    </div>
</div>
<script>
    function copy() {
        var text = document.getElementsByTagName("textarea")[1]
        text.select()
        document.execCommand("copy")
    }
</script>
@endsection