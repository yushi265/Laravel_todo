@extends('layouts.app')

@section('content')
<div class="container main">
    <h1>検索結果</h1>
    <ul>
        @forelse ($results as $result)
        <li>
            <a href="{{ action('TaskController@show', $result)}}">{{ $result->body }}</a>
        </li>
        @empty
        <li>
            一致するタスクがありませんでした
        </li>
        @endforelse
    </ul>

</div>

@endsection
